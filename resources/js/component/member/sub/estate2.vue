<template>
    <div>
        <li>
            <span>
                連絡手段
            </span>
            <span>
                <span  v-for="(label_str, value_str) in master_list.contact">
                    <input
                        type="radio"
                        :id=" 'contact_' + value_str "
                        :value="value_str"
                        v-model="member.contact"
                    >
                <label :for="'contact_' + value_str">{{label_str}}</label>
                </span>
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

            <b-form-group>
                <b-form-checkbox-group
                label="Button-group style checkboxes"
                v-model="member.traffic"
                :options="master_list.traffic"
                buttons
                button-variant="outline-primary"
                size="md"
                name="buttons-2"
                >
                </b-form-checkbox-group>
            </b-form-group>
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
export default {
  name: 'App',
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
