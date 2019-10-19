import Vue from 'vue';
import Vuex from 'vuex';
import member from './member.js'

Vue.use(Vuex);

const module = {
    modules:{
        member
    }
}

export default new Vuex.Store(module);
