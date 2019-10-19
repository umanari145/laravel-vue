<template>
    <div>
        <estatePanel></estatePanel>
        <div @click="registMember">
            保存だよ
        </div>
    </div>
</template>
<script>
import estatePanel from './estatePanel';
export default {
  name: 'App',
  components: {
    estatePanel
  },
  methods:{
    registMember() {
      let member = this.$store.getters["member/getMember"]
      let memberId = this.$route.params.member_id;
      let params = {
        'member':member
      }
      axios.put(
          `/api/member/edit/${memberId}`,
          params
      ).then(res => {
          console.log("登録しました")
      }).catch(error => {
          console.log("失敗しました")
      })
    },
    async getMember(member_id) {
        let link = `/api/member/detail/${member_id}`
        return await axios.get(link);
    }
  },
  created(){
      this.is_loading = 1
      let memberId = this.$route.params.member_id;

      this.getMember(memberId).then(response => {
          if (response.status == '200' && response.data.res == true && response.data.member != undefined) {
              let member = response.data.member
              this.$store.commit("member/setMember", member);
          } else {

          }
          this.is_loading = 0
      }, error => {

      })
  }
}
</script>
