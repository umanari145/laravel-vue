<template>
    <div>
        <div v-show="is_loading == 1">
            <loading></loading>
        </div>
        <ul>
            <li v-for="(member,index) in members">
                <span>{{member.id}}</span>
                <span>{{member.person_name}}</span>
                <span>{{member.tel}}</span>
                <span>{{member.email}}</span>
                <span>{{member.created_at}}</span>
                <span>
                    <a :href=" '/#/edit/' + member.id">編集</a>
                </span>
            </li>
        </ul>
        <div @click="$modal.show('searchModal')">検索</div>
        <searchModal></searchModal>
    </div>
</template>
<script>
import Sugar from 'Sugar';
import loading from '../../util/loading'
import searchModal from '../../util/searchModal'

export default {
  name: 'App',
  components:{
      loading,
      searchModal
  },
  computed:{
      members: {
        get() {
            return this.$store.getters["members/getMembers"];
        },
        set(val) {
          this.$store.commit("members/setMembers", val);
        }
      },
  },
  methods:{
    registMember() {

    },
    async getMembers() {
        let link = '/api/member/list'
        return await axios.get(link);
    }
  },
  created(){
      this.is_loading = 1
      this.getMembers().then(response => {
          let members = response.data;

          this.$store.commit("members/setMembers", members);
          this.is_loading = 0
      }, error => {
          this.is_loading = 0
          alert('データ取得に失敗しました。')
      })
  },
  data(){
    return {
        is_loading:0,
    }
  }
}
</script>
