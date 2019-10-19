
<!--都道府県-->
@{{selectedPref}}
<div v-show="isshowpref">
    <span class="btn btn-primary" v-on:click="checkPref">県選択</span>
    <div>
        <li class="l_20" v-for="(pref,index) in prefs">
            <input type="radio" v-bind:value="index" v-model="selectedPref" v-bind:id="'pref_' + index">
            <label v-bind:for="'pref_' + index">@{{pref}}</label>
        </li>
    </div>
</div>

<!--市区町村-->
@{{selectedCities}}
<div v-show="isshowcity">
  <span class="btn btn-primary" v-on:click="checkTown">市区町村選択</span>
  <div>
  <li class="l_20" v-for="(city,index2) in cities">
    <input type="checkbox" v-bind:id="'city_' + index2" v-bind:value=index2  v-model="selectedCities">
    <label v-bind:for="'city_' + index2">@{{city}}</label>
  </li>
  </div>
</div>


@{{selectedTowns}}
<div v-show="isshowtown">
<button v-show="selectedTowns.length > 0 " class="btn btn-primary" v-on:click="checkTown">確定する</button>
<button v-show="selectedTowns.length == 0 " class="btn btn-primary" disabled=disabled >確定する</button>
  <div class="cities" v-for = " ( towns, cityName ) in groupCities">
    <h3>@{{cityName}}</h3>
    <!--親のliと子が共に全く同じhtmlの場合二重ループがきかないので注意-->
    <li class="town l_20" v-for=" (town, index2) in towns">
      <input type="checkbox" v-bind:id="'town_'+ index2 " v-bind:value=index2 v-model="selectedTowns">
      <label v-bind:for="'town_' + index2">@{{town}}</label>
    </li>
  </div>
</div>