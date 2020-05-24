<template>
    <div>
        <modal name="searchModal">

          <div style="margin-top:20px;margin-left:30px;">

            <div class="">
              <label for="">メンバー名</label>
              <input type="text" v-model="person_name" placeholder="山田　太郎">
            </div>

            <div class="">
              <label for="">性別</label>
                <Radio
                  :value.sync="sex"
                  :kv_list="master_list.sex_list"
                  radio_key="contact"
                ></Radio>
            </div>

            <div class="">
              <label for="">職業</label>
              <Select
                :value.sync="occupation"
                :kv_list="master_list.occupation"
              ></Select>
            </div>

            <div class="">
              <label for="">交通手段</label>
              <CheckBox
                checkbox_key="traffic"
                :kv_list="master_list.traffic"
                :value.sync="traffic"
              >
              </CheckBox>
            </div>

            <button @click="searchMememer()">検索</button>
          </div>
        </modal>
    </div>
</template>

<script>
import Select from "@/component/Parts/Forms/Select";
import Radio from "@/component/Parts/Forms/Radio";
import CheckBox from "@/component/Parts/Forms/CheckBox";

export default {
    name: 'App',
    components: {
      Select,
      Radio,
      CheckBox
    },
    computed:{
      master_list:{
          get() {
              //連動型のプルダウン
              return this.$store.getters["master/getMaster"];
          }
      }
    },
    methods:{
        async searchMememer() {

            let search_params = {
                'person_name':this.person_name,
                'sex':this.sex,
                'occupation':this.occupation
            }

            let query_str = ''
            let query_arr = []
            _.forEach(search_params, (query_value, query_name)=>{
                if (query_value !== undefined && query_value !== '') {
                    query_arr.push(`${query_name}=${query_value}`)
                }
            })

            if (query_arr.length > 0) {
                query_str = '?' + query_arr.join('&')
            }

            let link = `/api/member/list${query_str}`

            return await axios.get(link).then((res)=> {
                if (res.status == 200) {
                    if (res.data.length > 0) {
                        this.$store.commit("members/setMembers", res.data);
                    } else {
                        alert("データが存在しません。")
                    }
                } else {
                    alert("サーバー内でエラーが発生しています。")
                }
                this.$modal.hide('searchModal')
            }).catch(error =>{
                alert("データの取得に失敗しました。")
                this.$modal.hide('searchModal')
            });
        }
    },
    data(){
      return {
          person_name:'',
          sex:'',
          occupation:'',
          traffic:[],
      }
    }
}
</script>
