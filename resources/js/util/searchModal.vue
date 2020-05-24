<template>
    <div>
        <modal name="searchModal" class="modal_wrapper">
          <div class="spininng_back" v-if="is_show_spinner == 1">
              <b-spinner label="Spinning" type="grow">
              </b-spinner>
          </div>
          <div style="margin-top:20px;margin-left:30px;">

            <div class="">
              <label for="">メンバー名</label>
              <input type="text" v-model="search.person_name" placeholder="山田　太郎">
            </div>

            <div class="">
              <label for="">性別</label>
                <Radio
                  :value.sync="search.sex"
                  :kv_list="master_list.sex"
                  radio_key="sex"
                ></Radio>
            </div>

            <div class="">
              <label for="">職業</label>
              <Select
                :value.sync="search.occupation"
                :kv_list="master_list.occupation"
              ></Select>
            </div>

            <div class="" style="margin-top:15px;">
              <label for="">交通手段</label>
              <CheckBox
                checkbox_key="traffic"
                :kv_list="master_list.traffic"
                :value.sync="search.traffic"
              >
              </CheckBox>
            </div>

            <button @click="searchMememer()">検索</button>
          </div>
        </modal>
    </div>
</template>

<script>
import Select from "@/component/Parts/Forms/Select";
import Radio from "@/component/Parts/Forms/Radio";
import CheckBox from "@/component/Parts/Forms/CheckBox";

export default {
    name: 'App',
    components: {
      Select,
      Radio,
      CheckBox
    },
    computed:{
      master_list:{
          get() {
              //連動型のプルダウン
              return this.$store.getters["master/getMaster"];
          }
      },
      search:{
          get() {
              return this.$store.getters['search/getSearch'];
          },
  //        set(val) {
  //            this.$store.commit("search/setSearh", val);
  //        }
      }
    },
    methods:{
        async searchMememer() {
            let search_params = this.$store.getters['search/getSearch'];


            let link = `/api/member/list`

            this.is_show_spinner = 1;

            return await axios.get(link, {
              params:search_params
            }).then((res)=> {
                if (res.status == 200) {
                    if (res.data.length > 0) {
                        this.$store.commit("members/setMembers", res.data);
                    } else {
                        alert("データが存在しません。")
                    }
                } else {
                    alert("サーバー内でエラーが発生しています。")
                }
                this.$modal.hide('searchModal')
            }).catch(error =>{
                alert("データの取得に失敗しました。")
                this.$modal.hide('searchModal')
            }).finally(()=>{

              //タグ
              for(var search_key in search_params) {
                  var val = search_params[search_key];
                  this.$store.commit("searchTag/setSearchTag", { 'prop': search_key , 'value' : val});
              }
              this.$store.commit("searchTag/setShowTag", true);

              this.is_show_spinner = 0;
            });
        }
    },
    data(){
      return {
          is_show_spinner:0,
          person_name:'',
          sex:'',
          occupation:'',
          traffic:[],
      }
    }
}
</script>
