<template>
    <div>
        <estatePanel></estatePanel>
        <div @click="registMember">
            保存だよ
        </div>
    </div>
</template>
<script>
import estatePanel from './sub/estatePanel';
export default {
  name: 'App',
  components: {
    estatePanel
  },
  methods:{
    registMember() {
        let member = this.$store.getters["member/getMember"]
        let params = {
            'member':member
        }
        axios.post(
          `/api/member/regist`,
          params
      ).then(res => {
          console.log("登録しました")
      }).catch(error => {
          console.log("失敗しました")
      })
    }
  },
  created(){

  },
  data(){

  }
}
</script>
