
const search = {
    namespaced: true,
    state:{
        search:{
            'person_name':'qqq',
            'sex':'',
            'occupation':'',
            'traffic':[]
        }
    },
    getters:{
        getSearch(state) {
            return state.search
        }
    },
    mutations:{
        setSearh(state, key, value) {
            state.search[key] = value
        },
    },
    actions:{

    }
}

export default search
