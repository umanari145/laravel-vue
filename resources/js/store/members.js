

const members = {
    namespaced: true,
    state:{
        members:[]
    },
    getters:{
        getMembers(state) {
            return state.members
        }
    },
    mutations:{
        setMembers(state, members) {
            state.members = members
        }
    },
    actions:{

    }
}

export default members
