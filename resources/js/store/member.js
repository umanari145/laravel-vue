

const member = {
    namespaced: true,
    state:{
        member:{
            'person_name':'',
            'sex':'',
            'occupation':'',
            'birtdh_day':'',
            'zip':'',
            'address1':'',
            'address2':'',
            'email':'',
            'tel':'',
            'traffic':[],
            'contents':''
        }
    },
    getters:{
        getMember(state) {
            return state.member
        },
        getProp(state, prop) {
            return state.member.prop
        },
    },
    mutations:{
        setMember(state, member) {
            state.member = member
        },
        setProp(state, {prop, value}) {
            state.member[prop] = value
        }
    },
    actions:{

    }
}

export default member
