<template>
    <div style="display:flex;justify-content:flex-start">
      <span>
        <Select
          :value.sync="inputCategory"
          :kv_list="category_list"
        ></Select>
      </span>
      <input type="text" v-model="inputName">
      <input type="text" v-model="inputPrice">
    </div>
</template>

<script>
import Select from "@/component/Parts/Forms/Select";

export default {
    components:{
      Select
    },
    props:{
        category_list:{
            type:Object
        },
        category:{
            type:String,
            required:true
        },
        name:{
            type:String,
            required:true
        },
        price:{
            type:String,
            required:true
        }
    },
    computed:{
        inputName:{
          get() {
              return this.name
          },
          set(value) {
              this.$emit("update:name",value)
          }
        },
        inputPrice:{
          get() {
              return this.price
          },
          set(value) {
              this.$emit("update:price",value)
          }
        },
        inputCategory:{
          get() {
              return this.category
          },
          set(value) {
              this.$emit("update:category",value)
          }
        }
    }
}
</script>
