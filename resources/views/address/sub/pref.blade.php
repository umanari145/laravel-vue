<!--都道府県-->
@{{selectedPref.label}}
<div v-show="isshowpref">
    <button class="btn btn-primary" >県選択</button>
    <div>
        <li class="l_20" v-for="(pref,index) in prefs">
            <input type="radio" v-bind:value="{value:index, label:pref}" v-model="selectedPref" v-bind:id="'pref_' + index">
            <label v-bind:for="'pref_' + index">@{{pref}}</label>
        </li>
    </div>
</div>
