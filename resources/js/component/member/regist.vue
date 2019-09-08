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
                <span>
                    <MasterLists
                      type="radio"
                     v-on:child-event="parentMethod"
                     :member="sex"
                     :kvlists="master_list.sex"
                     hash_key="sex">
                   </MasterLists>
                </span>
            </li>
            <li>
                <span>
                    職業
                </span>
                <span>
                    <MasterLists
                        type="select"
                        :member="occupation"
                        :kvlists="master_list.occupation"
                        hash_key="occupation">
                    </MasterLists>
                </span>
            </li>
            <li>
                <span>
                    誕生日
                </span>
                <span>
                    <input type="text" v-model="member.person_name">
                </span>
            </li>
            <li>
                <span>
                    郵便番号
                </span>
                <span>
                    <input type="text" v-model="member.person_name">
                </span>
            </li>
            <li>
                <span>
                    住所1
                </span>
                <span>
                    <input type="text" v-model="member.person_name">
                </span>
            </li>
            <li>
                <span>
                    住所2
                </span>
                <span>
                    <input type="text" v-model="member.person_name">
                </span>
            </li>
            <li>
                <span>
                    メールアドレス
                </span>
                <span>
                    <input type="text" v-model="member.person_name">
                </span>
            </li>
            <li>
                <span>
                    電話番号
                </span>
                <span>
                    <input type="text" v-model="member.person_name">
                </span>
            </li>
            <li>
                <span>
                    交通手段
                </span>
                <span>
                    <input type="text" v-model="member.person_name">
                </span>
            </li>
            <li>
                <span>
                    備考
                </span>
                <span>
                    <input type="text" v-model="member.person_name">
                </span>
            </li>
        </ul>
    </div>
</template>
<script>
import Sugar from 'Sugar';
import MasterLists from './MasterLists';
export default {
  name: 'App',
  components: {
    MasterLists
  },
  methods:{
    registMember() {
    },
    parentMethod(value) {

    }
  },
  created(){

  },
  data(){

    let sex_list = {"1":"男", "2":"女"}
    let occupation_list = {"1":"学生", "2":"会社員", "3":"自営業・経営者", "4":"その他"}
    let master_list = {
        "sex":sex_list,
        "occupation":occupation_list
    }

    return {
        master_list:master_list,
        member:{
            "sex":'',
            "person_name":''
        }
    }
  }
}
</script>
