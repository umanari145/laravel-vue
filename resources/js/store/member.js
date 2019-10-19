

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
        }
    },
    actions:{
        async save({state}) {
            const json = await axios.post(`/api/member/regist`, state.member)
        }
   }
}

export default member
