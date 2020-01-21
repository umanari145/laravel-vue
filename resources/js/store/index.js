import Vue from 'vue';
import Vuex from 'vuex';
import loading from './loading.js'
import member from './member.js'
import members from './members.js'
import master from './master.js'

Vue.use(Vuex);

const module = {
    modules:{
        loading,
        member,
        members,
        master
    }
}

export default new Vuex.Store(module);
