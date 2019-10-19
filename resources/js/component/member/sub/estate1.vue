<template>
    <div>
        <li>
            <span>
                名前
            </span>
            <span>
                <input type="text" v-model="member.person_name">
            </span>
        </li>
        <li>
            <span>
                性別
            </span>
           <span  v-for="(label_str, value_str) in master_list.sex">
               <input
                   type="radio"
                   :id=" 'sex_' + value_str "
                   :value="value_str"
                   v-model="member.sex"
               >
               <label :for="'sex_' + value_str">{{label_str}}</label>
           </span>
        </li>
        <li>
            <span>
                職業
            </span>
            <span>
                <select v-model="member.occupation" >
                    <option v-for="(label_str, value_str) in master_list.occupation" :value="value_str" >
                        {{label_str}}
                    </option>
                </select>
            </span>
        </li>
        <li>
            <span>
                誕生日
            </span>
            <span>
                <input type="text" v-model="member.birtdh_day">
            </span>
        </li>
        <li>
            <span>
                郵便番号
            </span>
            <span>
                <input type="text" v-model="member.zip">
                <button @click="supportAddress(member.zip)">検索</button>
            </span>
        </li>
        <li>
            <span>
                住所1
            </span>
            <span>
                <input type="text" v-model="member.address1">
            </span>
        </li>
        <li>
            <span>
                住所2
            </span>
            <span>
                <input type="text" v-model="member.address2">
            </span>
        </li>
    </div>
</template>
<script>
export default {
  name: 'App',
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
      async supportAddress(zip) {
          let link = `/api/getAddress?zip=${zip}`
          return axios.get(link).then(response => {
              if (response !== undefined ){
                if (response.data.full_address !== undefined) {
                    this.$store.commit("member/setProp", { 'prop': 'address1' , 'value' : response.data.full_address});
                } else {
                    alert("住所が存在しません。")
                }
              }
          },
         error =>{

         });
      }
  },
  created(){

  }
}
</script>
