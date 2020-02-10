<template>
    <div>
        <li>
            <button @click="disp_member">デバッグ</button>
        </li>
        <li>
            <span>
                名前
            </span>
            <span>
                <input type="text" v-model="member.person_name">
            </span>
        </li>
        <li>
            <span>
                性別
            </span>
            <Radio
             :value.sync="member.sex"
             :kv_list="master_list.sex"
             radio_key="sex"
            ></Radio>
        </li>
        <li>
            <span>
                好きな野球チーム
            </span>
            <span>
                <Radio
                :value.sync="member.baseball_team"
                :kv_list="master_list.baseball_team"
                radio_key="baseball"
                ></Radio>
            </span>
        </li>
        <li>
            <span>
                職業
            </span>
            <span>
              <Select
                :value.sync="member.occupation"
                :kv_list="master_list.occupation"
              ></Select>
            </span>
        </li>
        <li>
            <span>
                職業(その２)
            </span>
            <span>
              <Select
                :value.sync="member.sub_occupation"
                :kv_list="master_list.sub_occupation[member.occupation]"
              ></Select>
            </span>
        </li>
        <li>
            <span>
                誕生日
            </span>
            <span>
                <input type="text" v-model="member.birtdh_day">
            </span>
        </li>

        <li>
            <span>
                郵便番号
            </span>
            <span>
                <input type="text" v-model="member.zip">
                <b-button variant="info" @click="supportAddress(member.zip, 'live')"  v-b-tooltip.hover title="郵便番号から住所検索ができます。">検索</b-button>
                <b-button variant="info" @click="$modal.show('areaModal')">入力補助</b-button>
            </span>
        </li>
        <li>
            <span>
                住所1
            </span>
            <span>
                <input type="text" v-model="member.address1">
            </span>
        </li>
        <li>
            <span>
                住所2
            </span>
            <span>
                <input type="text" v-model="member.address2">
            </span>
        </li>

        <!--配送先-->
        <li>
            <span>
                配送先郵便番号
            </span>
            <span>
                <input type="text" v-model="member.delivery_zip">
                <b-button variant="info" @click="supportAddress(member.delivery_zip, 'delivery')"  v-b-tooltip.hover title="郵便番号から住所検索ができます。">検索</b-button>
                <b-button variant="info" @click="$modal.show('areaModal')">入力補助</b-button>
            </span>
        </li>
        <li>
            <span>
                配送先住所1
            </span>
            <span>
                <input type="text" v-model="member.delivery_address1">
            </span>
        </li>
        <li>
            <span>
                配送先住所2
            </span>
            <span>
                <input type="text" v-model="member.delivery_address2">
            </span>
        </li>

        <li style="width:300px;">
            <b-form-file
                v-model="input_file"
                :state="Boolean(file)"
                placeholder="ファイルを選択してください。"
                @change="uploadbase64"
            ></b-form-file>
            <div v-if="disp_image !=''">
                <b-button @click="resetImage">画像リセット</b-button>
            </div>
            <div v-if="disp_image !=''">
              <img :src="disp_image" style="width:300px;height:500px;">
            </div>
        </li>
        <areaModal></areaModal>
    </div>
</template>
<script>
import areaModal from "@/component/area/areaModal";
import address_repository from "@/repository/address_repository";
import Select from "@/component/Parts/Forms/Select";
import Radio from "@/component/Parts/Forms/Radio";

const add_repo = new address_repository();

export default {
  name: 'App',
  components:{
    areaModal,
    Select,
    Radio
  },
  computed:{
      member: {
          get() {
            return this.$store.getters["member/getMember"];
          },
          set(val) {
            this.$store.commit("member/setMember", val);
          }
      },
      master_list:{
          get() {
              //連動型のプルダウン
              return this.$store.getters["master/getMaster"];
          }
      }
  },
  methods:{
      uploadbase64() {
          let files = event.target.files || event.dataTransfer.files;
          if (!files.length) {
                return;
          }
          this.createImage(files[0])
      },
      createImage(file) {
          let image = new Image();
          let reader = new FileReader();
          let vm = this
          reader.onload = function(e) {
              vm.disp_image = e.target.result;
          };
          reader.readAsDataURL(file);
      },
      resetImage() {
          this.disp_image = ""
          this.input_file = ""
      },

      supportAddress(zip, address_key) {
          this.$store.commit("loading/setIsLoading", 1);
          let address1_key = '';
          let address2_key = '';
          switch (address_key) {
            case 'live':
                address1_key = 'address1';
                address2_key = 'address2';
              break;
            case 'delivery':
              address1_key = 'delivery_address1';
              address2_key = 'delivery_address2';
              break;
            default:
              break;
          }

          this.$store.commit("member/setProp", { 'prop': address1_key , 'value' : ''});
          this.$store.commit("member/setProp", { 'prop': address2_key , 'value' : ''});

          add_repo.getAddressByZip(zip)
          .then((response) => {
            if (response.data.full_address !== undefined) {
               this.$store.commit("member/setProp", { 'prop': address1_key , 'value' : response.data.full_address});
            } else {
              alert("住所が存在しません。");
            }
          })
          .catch((err) => {
            alert("サーバーとの通信に失敗しました。");
          })
          .finally(()=>{
            this.$store.commit("loading/setIsLoading", 0);
          })

     },
     disp_member() {
        let member = this.$store.getters["member/getMember"];
        console.log(member)
     }
  },
  created(){
  },
  mounted() {

  },
  data() {
    return {
        input_file:null,
        disp_image:""
    }
  },
}
</script>
