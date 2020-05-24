<template>
    <div>
        <div v-show="is_loading">
            <Loading></Loading>
        </div>

        <ul v-show="is_show_tag">
          <template v-for="(each_search, search_key) in searchTag">

            <template v-if="Array.isArray(each_search)">
              <template v-for="search_str in each_search">
                <li v-if="search_str !== undefined && search_str !== ''">
                  {{search_str}}
                </li>
              </template>
            </template>

            <template v-else>
              <li v-if="each_search !== undefined && each_search !== '' ">
                {{each_search}}
              </li>
            </template>

          </template>
        </ul>

        <div @click="$modal.show('searchModal')" style="margin-left:30px;">検索</div>
        <searchModal></searchModal>
        <ul>
            <li v-for="(member,index) in members">
                <span>{{member.id}}</span>
                <span>{{member.person_name}}</span>
                <span>{{member.tel}}</span>
                <span>{{member.email}}</span>
                <span>{{member.created_at}}</span>
                <span>
                    <a :href=" '/edit/' + member.id">編集</a>
                </span>
            </li>
        </ul>
    </div>
</template>
<script>
import Sugar from 'Sugar';
import Loading from "@/component/Global/Loading"
import searchModal from "@/util/searchModal"
import member_repository from "@/repository/member_repository"

const member_repo = new member_repository()

export default {
  name: 'App',
  components:{
      Loading,
      searchModal
  },
  computed:{
      members: {
        get() {
            return this.$store.getters["members/getMembers"];
        }
      },
      searchTag: {
        get() {
            return this.$store.getters["searchTag/getSearchTag"];
        }
      },
      is_show_tag: {
        get() {
            return this.$store.getters["searchTag/getShowTag"];
        }
      },
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

    },
  },
  created(){
      this.is_loading = 1
      member_repo
      .getMembers()
      .then(response => {
          let members = response.data;
          this.$store.commit("members/setMembers", members);
      }).catch((err) => {
        alert("メンバー取得に失敗しました。")
      }).finally(() => {
        this.is_loading = 0
      })
  }
}
</script>
