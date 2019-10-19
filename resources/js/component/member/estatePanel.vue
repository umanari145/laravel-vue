<template>
    <div>
        <ul>
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
            <li>
                <span>
                    メールアドレス
                </span>
                <span>
                    <input type="text" v-model="member.email">
                </span>
            </li>
            <li>
                <span>
                    電話番号
                </span>
                <span>
                    <input type="text" v-model="member.tel">
                </span>
            </li>
            <li>
                <span>
                    交通手段
                </span>
                <span v-for="(label_str, value_str) in master_list.traffic">
                    <input
                        type="checkbox"
                        :id=" 'traffic_' + value_str "
                        :value="value_str"
                        v-model="member.traffic"
                    >
                    <label :for=" 'traffic_' +  value_str">{{label_str}}</label>
                </span>
            </li>
            <li>
                <span>
                    備考
                </span>
                <span>
                    <textarea v-model="member.contents"></textarea>
                </span>
            </li>
        </ul>

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
      }
  },
  methods:{

  },
  created(){

  },
  data(){

    let sex_list = {"1":"男", "2":"女"}
    let occupation_list = {"1":"学生", "2":"会社員", "3":"自営業・経営者", "4":"その他"}
    let traffic_list = {"1":"徒歩", "2":"自転車", "3":"バス", "4":"電車", "5":"その他"}
    let master_list = {
        "sex":sex_list,
        "occupation":occupation_list,
        "traffic":traffic_list
    }

    return {
        master_list:master_list,
    }
  }
}
</script>
