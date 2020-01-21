<template>
    <div class="modal_wrapper">
        <modal name="areaModal"
        :adaptive=true
        :width="800"
        :height="500"
        :scrollable=true
        @before-open="getPref"
        >
        <!--ローディング-->
        <div class="spininng_back" v-if="is_show_spinner == 1">
            <b-spinner label="Spinning" type="grow">
            </b-spinner>
        </div>
        <b-tabs
        content-class="mt-3"
        >
            <b-tab title="都道府県" :active="is_pref_active" :disabled="is_pref_disabled">
                <div class="inner_wrapper">
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
                    <div class="button_wrapper">
                        <b-button variant="outline-primary" v-if="is_show_spinner == 0" @click="searchCity()">市区検索</b-button>
                    </div>
                </div>
            </b-tab>

            <b-tab title="市区"
            :active="is_town_active"
            :disabled="is_town_disabled"
            >
                <div class="inner_wrapper">
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
                    <div class="button_wrapper">
                        <b-button variant="outline-primary" v-if="is_show_spinner== 0" @click="searchTown()">町村検索</b-button>
                    </div>
                </div>
            </b-tab>

            <b-tab title="町村"
            :active="is_choson_active"
            :disabled="is_choson_disabled"
            class="inner_wrapper"
            >
                <div class="inner_wrapper">
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
                    <div class="button_wrapper">
                        <b-button variant="outline-primary" @click="setAddress">入力</b-button>
                    </div>
                </div>
            </b-tab>
        </b-tabs>
        </modal>
    </div>
</template>

<script>

import address_repository from "@/repository/address_repository.js"

const add_repo = new address_repository()

export default {
    methods:{
        getPref(){
            add_repo.getPref().
            then((response) => {
                if (response !== undefined ){
                  if (response.data !== undefined) {
                      this.prefs = response.data
                  } else {
                      alert("県が存在しません。")
                  }
                }
            }).catch((err) => {
                alert("サーバーとの通信に失敗しました。")
            }).finally(()=>{
                this.is_show_spinner = 0;
            })
        },
       searchCity() {
           this.is_show_spinner = 1;
           let pref_cd = this.selectedPref
           add_repo.searchCity(pref_cd).
           then((response) => {
               if (response.data !== undefined) {
                   this.cities = response.data
                   this.fullcities = response.data
                   this.is_pref_active = true
                   this.is_pref_disabled = true
                   this.is_town_active = true
                   this.is_town_disabled = false
               } else {
                   alert("市区町村が存在しません。")
               }
           }).catch((err) => {
              alert("サーバーとの通信に失敗しました。")
           }).finally(()=>{
              this.is_show_spinner = 0;
           })
       },
       screening_city() {
         //一度初期化する
         this.cities = this.fullcities
         this.cities = _.filter(this.cities, (city) => {
             return city.shikuchouson.indexOf(this.filter_city) != -1
         })
       },
       searchTown() {
           let pref_cd = this.selectedPref
           let city_cd = this.selectedCity
           this.is_show_spinner = 1;
           add_repo.searchTown(pref_cd, city_cd).
           then((response) => {
               if (response.data !== undefined) {
                   this.towns= response.data
                   this.fulltowns = response.data
                   this.is_town_active = false
                   this.is_town_disabled = true
                   this.is_choson_active = true
                   this.is_choson_disabled = false
               } else {
                   alert("市区町村が存在しません。")
               }
           }).catch((err) => {
              alert("サーバーとの通信に失敗しました。")
           }).finally(() => {
              this.is_show_spinner = 0;
           })
       },
       screening_town() {
         //一度初期化する
         this.towns = this.fulltowns
         this.towns = _.filter(this.towns, (town) => {
             return town.ooaza.indexOf(this.filter_town) != -1
         })
       },
       setAddress() {
          this.$store.commit("member/setProp", { 'prop': 'zip' , 'value' : ''});
          this.$store.commit("member/setProp", { 'prop': 'address1' , 'value' : ''});
          this.$store.commit("member/setProp", { 'prop': 'address2' , 'value' : ''});

          this.$store.commit("member/setProp", { 'prop': 'zip' , 'value' : this.selectedAddress.zip});
          this.$store.commit("member/setProp", { 'prop': 'address1' , 'value' : this.selectedAddress.full_address});
          this.$modal.hide('areaModal')
          this.modal_init()
       },
       modal_init() {
           this.is_show_spinner = 1
           this.prefs = ''
           this.selectedPref = ''
           this.cities = []
           this.fullcities = []
           this.selectedCity = ''
           this.towns = []
           this.is_pref_active = true
           this.is_pref_disabled = false
           this.is_town_active = false
           this.is_town_disabled = true
           this.is_choson_active = false
           this.is_choson_disabled = true
           this.fulltowns = []
           this.filter_city = ''
           this.filter_town = ''
           this.selectedAddress = null

       }
    },
    created() {
        //モーダルの見えた時とは違うので注意
    },
    data(){
        return {
            is_show_spinner:1,
            prefs:'',
            selectedPref:'',
            cities:[],
            fullcities:[],
            selectedCity:'',
            towns:[],
            is_pref_active:true,
            is_pref_disabled:false,
            is_town_active:false,
            is_town_disabled:true,
            is_choson_active:false,
            is_choson_disabled:true,
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

.inner_wrapper{
    margin: 10px;
}
.modal_wrapper{
    position: relative;
}

.spininng_back{
    opacity: 0.7;
    background: #fff;
    position: absolute;
    z-index: 10;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}


.button_wrapper{
    margin-top: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.area_block{
    margin-left: 5px;
    overflow-y: scroll;
    height: 250px;
}
</style>
