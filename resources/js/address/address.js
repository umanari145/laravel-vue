export default {
  name: 'App',
  methods:{
      checkPref: function(){
          var selectedPref = Sugar.String(this.selectedPref)
          if (!selectedPref.isBlank().raw ){
              let cityUrl2 = this.cityUrl + '?pref_cd='+ selectedPref.raw
              axios.get(cityUrl2).then(response => {
                  this.cities = response.data;
                  this.isshowpref = 0
                  this.isshowcity = 1
              });
          }
      },
      checkTown : function(){
          if (this.selectedCities.length >0){
              let cityStr = this.selectedCities.join(",")
              let townUrl2 = this.townUrl + '?pref_cd=' + this.selectedPref + '&city_cd=' + cityStr
              axios.get(townUrl2).then(response => {
                  this.groupCities = response.data;
                  this.isshowcity = 0
                  this.isshowtown = 1
              });
          }
      }
  },
  created:function(){
      //exportの外だとまだ$が使えるようになっていない
      //DOMが表示されていないから？なのでここでurlを定義
      let entryUrl = $('#entry_url').val()
      this.prefUrl = entryUrl + 'getPref'
      this.cityUrl = entryUrl + 'getCity'
      this.townUrl = entryUrl + 'getTown'
      axios.get(this.prefUrl).then(response => {
          this.prefs = response.data;
      });
  },
  data(){
    return {
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
    }
  }
}
