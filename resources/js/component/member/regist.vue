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
      this.$store.commit("member/saveMember");
    }
  },
  created(){

  },
  data(){

  }
}
</script>
