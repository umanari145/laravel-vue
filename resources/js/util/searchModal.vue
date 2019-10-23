<template>
    <div>
        <modal name="searchModal">

            <label for="">メンバー名</label>
            <input type="text" v-model="person_name" placeholder="山田　太郎">

            <button @click="searchMememer()">検索</button>
        </modal>
    </div>
</template>

<script>
export default {
    methods:{
        async searchMememer() {

            let search_params = {
                'person_name':this.person_name
            }

            let query_str = ''
            let query_arr = []
            _.forEach(search_params, (query_value, query_name)=>{
                if (query_value !== undefined && query_value !== '') {
                    query_arr.push(`${query_name}=${query_value}`)
                }
            })

            if (query_arr.length > 0) {
                query_str = '?' + query_arr.join('&')
            }

            let link = `/api/member/list${query_str}`

            return await axios.get(link).then((res)=> {
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
            });
        }
    },
    data(){
      return {
          person_name:''
      }
    }
}
</script>
