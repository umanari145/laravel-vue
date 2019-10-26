<template>
    <div>
        <modal name="areaModal"
        :adaptive=true
        :width="800"
        :height="500"
        :scrollable=true
        @before-open="getPref"
        >
            <div v-show="showMode == 'pref'" style="position:relative;">
                <!--都道府県-->
                <span>県選択</span>
                <div>
                    <b-spinner label="Spinning" v-if="is_show_spinner == 1"></b-spinner>
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
                <button v-if="is_show_spinner == 0" @click="searchCity()">市区検索</button>
            </div>


            <div v-show="showMode == 'city'">
                <!--市区町村-->
                <span>市区選択</span>
                <input type="text" v-model="filter_city" v-on:keyup.enter.submit="screening_city">
                <div class="area_block">
                    <li class="l_20" v-for="(city,index2) in cities">
                      <input type="radio"
                      :id="'city_' + index2"
                      :value=city.shikuchouson_cd
                      v-model="selectedCity">
                      <label :for="'city_' + index2">{{city.shikuchouson}}</label>
                    </li>
                </div>
                <b-button variant="outline-primary" @click="searchTown()">町村検索</b-button>
            </div>

            <div v-show="showMode == 'town'">
                <!--町村-->
                <span>町村</span>
                <input type="text" v-model="filter_town" v-on:keyup.enter.submit="screening_town">
                <div class="area_block">
                  <li class="l_20" v-for = " ( town, index3 ) in towns">
                    <input type="radio"
                    :id="'town_'+ town.aza_cd"
                    :value= town
                    v-model="selectedAddress">
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
                this.is_show_spinner = 0;
            },
           error =>{
               this.is_show_spinner = 0;
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
                     this.cities = response.data
                     this.fullcities = response.data
                 } else {
                     alert("市区町村が存在しません。")
                 }
               }
           },
          error =>{
             alert("サーバーとの通信に失敗しました。。")
          });
       },
       screening_city() {
         //一度初期化する
         this.cities = this.fullcities
         this.cities = _.filter(this.cities, (city) => {
             return city.shikuchouson.indexOf(this.filter_city) != -1
         })
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
                     this.fulltowns = response.data
                 } else {
                     alert("市区町村が存在しません。")
                 }
               }
           },
          error =>{
             alert("サーバーとの通信に失敗しました。。")
          });
       },
       screening_town() {
         //一度初期化する
         this.towns = this.fulltowns
         this.towns = _.filter(this.towns, (town) => {
             return town.ooaza.indexOf(this.filter_town) != -1
         })
       },
       setAddress() {
           this.$store.commit("member/setProp", { 'prop': 'zip' , 'value' : this.selectedAddress.zip});
           this.$store.commit("member/setProp", { 'prop': 'address1' , 'value' : this.selectedAddress.full_address});
       }
    },
    created() {
        //モーダルの見えた時とは違うので注意
    },
    data(){
        return {
            is_show_spinner:1,
            prefs:'',
            showMode:'pref',
            selectedPref:'',
            cities:[],
            fullcities:[],
            selectedCity:'',
            towns:[],
            fulltowns:[],
            filter_city:'',
            filter_town:'',
            selectedAddress:null
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
