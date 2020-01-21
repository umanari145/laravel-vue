<template>
    <div>
       <div v-show="is_loading">
          <Loading></Loading>
        </div>
        <estatePanel></estatePanel>
        <div @click="registMember">
            保存だよ
        </div>
    </div>
</template>
<script>
import estatePanel from './sub/estatePanel';
import Loading from "@/component/Global/Loading";
export default {
  name: 'App',
  components: {
    estatePanel,
    Loading
  },
  computed:{
    is_loading:{
      get() {
        return this.$store.getters['loading/getIsLoading']
      },
      set(is_loading) {
        this.$store.commit("loading/setIsLoading", is_loading)
      }
    }
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
      this.is_loading = 1;
      let memberId = this.$route.params.member_id;
      this.getMember(memberId).then(response => {
          if (response.status == '200' && response.data.res == true && response.data.member != undefined) {
              let member = response.data.member
              this.$store.commit("member/setMember", member);
          }
      }).catch(err=>{
        alert("データの取得に失敗しました。");
      }).finally(()=>{
        console.log('aaaaa');
        this.is_loading = 0;
      })
  }
}
</script>
