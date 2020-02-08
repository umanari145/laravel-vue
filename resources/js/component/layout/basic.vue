<template>
    <div>
        <vue-drawer-layout ref="drawerLayout" @mask-click="hideDrawer">
            <!--sidebar-->
            <div class="drawer" slot="drawer"
            style="background:#fff;"
            :drawer-width="480"
            :drawable-distance="160"
            :z-index="0"
            :enable="false"
            :content-drawable="false"
            >
                <div class="text" style="color:#000;">サイドバーだよ</div>
                <a href="javascript:void(0)" class="btn"
                @click="handleToggleDrawer">ドロワーを隠します</a>
            </div>

            <div class="content" slot="content">
                <router-view></router-view>
                <a href="javascript:void(0)" class="btn"
                @click="handleToggleDrawer" style="display:block;">ドロワーを出します</a>
            </div>          
        </vue-drawer-layout>
    </div>
</template>
<script>
export default {
  name: 'App',
  methods:{
    hideDrawer() {
      this.$refs.drawerLayout.toggle(false);
    },
    handleToggleDrawer() {
      this.$refs.drawerLayout.toggle();
    }
  },
  created(){

  }
}
</script>
