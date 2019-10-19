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
        }
    },
    mutations:{
        setMember(state, member) {
            state.member = member
        },
        setSex(state,val) {
            state.member.sex = val
        },
        saveMember(state) {
            console.log(state.member)
        }
    },
    actions:{

   }
}

export default member