

const member = {
    namespaced: true,
    state:{
        member:{
            'person_name':'',
            'sex':'',
            'occupation':'',
            'sub_occupation':'',
            'contact':'',
            'selected_occupation':'',
            'baseball_team':'',
            'birtdh_day':'',
            'zip':'',
            'address1':'',
            'address2':'',
            'delivery_zip':'',
            'delivery_address1':'',
            'delivery_address2':'',
            'email':'',
            'tel':'',
            'traffic':[],
            'contents':''
        }
    },
    getters:{
        getMember(state) {
            return state.member
        }
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
