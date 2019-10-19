import Vue from 'vue';
import Vuex from 'vuex';
import member from './member.js'
import master from './master.js'

Vue.use(Vuex);

const module = {
    modules:{
        member,
        master
    }
}

export default new Vuex.Store(module);
