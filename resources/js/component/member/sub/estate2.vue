<template>
    <div>
        <li>
            <span>
                連絡手段
            </span>
            <span>
                <Radio
                :value.sync="member.contact"
                :kv_list="master_list.contact"
                :radio_key="'contact'"
                ></Radio>
            </span>
        </li>
        <li>
            <span>
                メールアドレス
            </span>
            <span>
                <input
                    type="text"
                    v-model="member.email"
                    :disabled= "disableEmail"
                    >
            </span>
        </li>
        <li>
            <span>
                電話番号
            </span>
            <span>
                <input
                type="text"
                v-model="member.tel"
                :disabled="disableTel"
                >
            </span>
        </li>
        <li>
            <span>
                交通手段
            </span>
            <CheckBox
              checkbox_key="traffic"
              :kv_list="master_list.traffic"
              :value.sync="member.traffic"
            >
            </CheckBox>
        </li>
        <li>
            <span>
                備考
            </span>
            <span>
                <textarea v-model="member.contents"></textarea>
            </span>
        </li>
    </div>
</template>
<script>
import Radio from "@/component/Parts/Forms/Radio";
import CheckBox from "@/component/Parts/Forms/CheckBox";

export default {
  name: 'App',
  components:{
    Radio,
    CheckBox
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
              return this.$store.getters["master/getMaster"];
          }
      }
  },
  methods:{

  },
  watch:{
      'member.contact':function(val){
          if (val == "1") {
              this.disableTel = false
              this.disableEmail = "disabled"
          } else if (val == "2") {
              this.disableEmail = false
              this.disableTel = "disabled"
          } else {
              this.disableTel = "disabled"
              this.disableEmail = "disabled"
          }
      }
  },
  created(){

  },
  data() {
      return {
          disableEmail:'disabled',
          disableTel:'disabled',
      }
  }
}
</script>
<style lang="scss">
input:disabled{
    background: #999999;
}
</style>
