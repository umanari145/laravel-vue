import Vue from 'vue';
import Vuex from 'vuex';
import loading from './loading.js'
import member from './member.js'
import members from './members.js'
import master from './master.js'
import search from './search.js'
import searchTag from './searchTag.js'

Vue.use(Vuex);

const module = {
    modules:{
        loading,
        member,
        members,
        master,
        search,
        searchTag
    }
}

export default new Vuex.Store(module);
