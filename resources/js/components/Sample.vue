<template>
  <div>
    this is sample
    <li v-for="book in books ">
    {{book}}
    </li>
  </div>

</template>

<script>
    export default {
        created() {
            this.fetchBook()
        },
        data() {
            return {
                books: ["aaaa"]
            }
        },
        methods: {
            fetchBook() {

            }
        }
    }
</script>
