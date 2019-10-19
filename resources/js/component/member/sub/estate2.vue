<template>
    <div>
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
            <span v-for="(label_str, value_str) in master_list.traffic">
                <input
                    type="checkbox"
                    :id=" 'traffic_' + value_str "
                    :value="value_str"
                    v-model="member.traffic"
                >
                <label :for=" 'traffic_' +  value_str">{{label_str}}</label>
            </span>
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
