<template>
    <div>
        <li>
            <span>
                メールアドレス
            </span>
            <span>
                <input type="text" v-model="member.email">
            </span>
        </li>
        <li>
            <span>
                電話番号
            </span>
            <span>
                <input type="text" v-model="member.tel">
            </span>
        </li>
        <li>
            <span>
                交通手段
            </span>
            <b-form-group>
                <b-form-checkbox-group
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
  created(){

  }
}
</script>
