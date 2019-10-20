<template>
    <div>
        <modal name="areaModal"
        :adaptive=true
        :width="800"
        :height="300"
        :scrollable=true
        @before-open="getPref"
        >
            <div v-show="showMode == 'pref'">
                <!--都道府県-->
                <span>県選択</span>
                <div>
                    <ul>
                        <li class="l_20" v-for="(pref,index) in prefs">
                            <input type="radio"
                            :value="index"
                            v-model="selectedPref"
                            :id="'pref_' + index">
                            <label :for="'pref_' + index">{{pref}}</label>
                        </li>
                    </ul>
                </div>
                <button @click="searchCity()">市区検索</button>
            </div>


            <div v-show="showMode == 'city'">
                <!--市区町村-->
                <span>市区選択</span>
                <div class="area_block">
                    <li class="l_20" v-for="(city,index2) in cities">
                      <input type="radio"
                      :id="'city_' + index2"
                      :value=index2
                      v-model="selectedCity">
                      <label :for="'city_' + index2">{{city}}</label>
                    </li>
                </div>
                <button @click="searchTown()">町村検索</button>
            </div>

            <div v-show="showMode == 'town'">
                <!--町村-->
                <div class="area_block">
                  <li class="l_20" v-for = " ( town, index3 ) in towns">
                    <input type="radio"
                    :id="'town_'+ town.aza_cd"
                    :value=town.full_address
                    v-model="selectedAdress">
                    <label :for="'town_' + town.aza_cd">{{town.ooaza}}</label>
                  </li>
                </div>
                <button @click="setAddress">入力</button>
            </div>
        </modal>
    </div>
</template>

<script>
export default {
    methods:{
        async getPref() {
            let link = `/api/getPref`
            return axios.get(link).then(response => {
                if (response !== undefined ){
                  if (response.data !== undefined) {
                      this.prefs = response.data
                  } else {
                      alert("県が存在しません。")
                  }
                }
            },
           error =>{
              alert("サーバーとの通信に失敗しました。。")
           });
       },
       async searchCity() {
           let pref_cd = this.selectedPref
           let link = `/api/getCity?pref_cd=${pref_cd}`
           return axios.get(link).then(response => {
               if (response !== undefined ){
                 if (response.data !== undefined) {
                     this.showMode = 'city'
                     this.cities= response.data
                 } else {
                     alert("市区町村が存在しません。")
                 }
               }
           },
          error =>{
             alert("サーバーとの通信に失敗しました。。")
          });
       },
       async searchTown() {
           let pref_cd = this.selectedPref
           let city_cd = this.selectedCity
           let link = `/api/getTown?pref_cd=${pref_cd}&city_cd=${city_cd}`

           return axios.get(link).then(response => {
               if (response !== undefined ){
                 if (response.data !== undefined) {
                     this.showMode = 'town'
                     this.towns= response.data
                 } else {
                     alert("市区町村が存在しません。")
                 }
               }
           },
          error =>{
             alert("サーバーとの通信に失敗しました。。")
          });
       },
       setAddress() {
           this.$store.commit("member/setProp", { 'prop': 'address1' , 'value' : this.selectedAdress});
       }
    },
    created() {
        //モーダルの見えた時とは違うので注意
    },
    data(){
        return {
            prefs:'',
            showMode:'pref',
            selectedPref:'',
            cities:'',
            selectedCity:'',
            towns:'',
            selectedAdress:''
        }
    }
}
</script>
<style lang="scss" scoped>
.l_20 {
    display: inline-block;
    width: 20%;
}

.area_block{
    overflow-y: scroll;
    height: 250px;
}
</style>
