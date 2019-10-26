<template>
    <div>
        <b-tabs content-class="mt-3">
            <b-tab title="個人情報その１" active>
                <ul>
                    <estate1></estate1>
                </ul>
            </b-tab>
            <b-tab title="個人情報その２">
                <ul>
                    <estate2></estate2>
                </ul>
            </b-tab>
        </b-tabs>
    </div>
</template>
<script>
import estate1 from './estate1';
import estate2 from './estate2';
export default {
  name: 'App',
  components: {
    estate1,
    estate2
  },
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

  }
}
</script>
