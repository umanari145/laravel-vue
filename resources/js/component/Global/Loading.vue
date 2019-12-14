<template>
    <div class="loading_back">
      <loading></loading>
    </div>
</template>
<script>
import loading from "@/util/loading"

export default {
  name: 'App',
  components:{
      loading
  }
}
</script>
<style lang="scss" scoped>
.loading_back{
  position: fixed;
  z-index: 9999;
  top:0;
  left:0;
  width: 100%;
  height: 100%;
  background: #fff;
  opacity: 0.7;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
