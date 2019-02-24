
import Vue from 'vue'
import Sugar from 'Sugar'

export default class {
    constructor() {
        let siteUrl = $('#site_url').val()
        prefUrl = siteUrl + 'getPref'
        cityUrl = siteUrl + 'getCity'
        townUrl = siteUrl + 'getTown'
    }

    add_vue_instance() {
        let app = new Vue({
            el : '#app',
            data : {
                prefs:[],
                selectedPrefIndex:'',
                selectedPref:'',
                isshowpref:1,
                cities:[],
                selectedCities:[],
                isshowcity:0,
                towns:[],
                selectedTowns:[],
                isshowtown:0,
                groupCities:[]
            },
    }

}

	var app = new Vue({
		el : '#app',
		data : {
			prefs:[],
            selectedPrefIndex:'',
			selectedPref:'',
			isshowpref:1,
			cities:[],
			selectedCities:[],
			isshowcity:0,
			towns:[],
			selectedTowns:[],
			isshowtown:0,
			groupCities:[]
		},
		methods:{
			checkPref: function(){
				var selectedPref = Sugar.String(this.selectedPref)
				if (!selectedPref.isBlank().raw ){
					cityUrl2 = cityUrl + '?pref_cd='+ selectedPref.raw
					axios.get(cityUrl2).then(response => {
						this.cities = response.data;
						this.isshowpref = 0
						this.isshowcity = 1
					});
				}
			},
			checkTown : function(){
				if (this.selectedCities.length >0){
					var cityStr = this.selectedCities.join(",")
					townUrl2 = townUrl + '?pref_cd=' + this.selectedPref + '&city_cd=' + cityStr
					axios.get(townUrl2).then(response => {
						this.groupCities = response.data;
						this.isshowcity = 0
						this.isshowtown = 1
					});
				}
			}
		},
		created:function(){
			//↓のように書かないとthisがvue instanceをさしていないため
			//画面の値が更新されない
			//https://teratail.com/questions/103176
			axios.get(prefUrl).then(response => {
				this.prefs = response.data;
			});
		}
	})
})
