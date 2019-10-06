<template>
    <div class="is-hidden">
        <vue-loading type="spin" color="#333" :size="{ width: '50px', height: '50px' }">
        </vue-loading>
    </div>
</template>

<script>
import Sugar from 'Sugar';
import { VueLoading } from 'vue-loading-template'
export default {
    // componentsに登録
    components: {
      VueLoading
    }
}
</script>
