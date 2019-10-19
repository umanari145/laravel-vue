const member = {
    namespaced: true,
    state:{
        members:[
            {
                'id':1,
                'person_name':'yamada',
            }
        ]
    },
    getters:{
       getMembers(state) {
           return self.actions.getMembers()
       }
    },
    mutations:{
        restore(state) {

        }
    },
    actions:{
        async getMembers({commit}) {
            let link = '/api/persons/'
            return await axios.get(link);
       },
       save({state}) {
           const data = {

           }
       },
       restore({commit}) {
           const data = localStorage.getItem('task-app-data')
           if (data) {
               commit('restore', JSON.parse(data))
           }
       }
   }
}

export default member
