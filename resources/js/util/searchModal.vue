<template>
    <div>
        <modal name="searchModal">

            <label for="">メンバー名</label>
            <input
            type="text"
            v-modal="member_name">

            <button @click="searchMememer()">検索</button>
        </modal>
    </div>
</template>

<script>
export default {
    methods:{
        searchMememer() {
            this.$store.dispatch('member/getMembers')
        }
    },
    data(){
      return {
          member_name:''
      }
    }
}
</script>
