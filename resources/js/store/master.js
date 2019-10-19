const master = {
    namespaced: true,
    state:{
        master:{
            'sex':'',
            'occupation':'',
            'traffic_list':'',
        }
    },
    getters:{
        getMaster(state) {
            let sex_list = {"1":"男", "2":"女"}
            let occupation_list = {"1":"学生", "2":"会社員", "3":"自営業・経営者", "4":"その他"}
            let traffic_list = {"1":"徒歩", "2":"自転車", "3":"バス", "4":"電車", "5":"その他"}
            state.master.sex = sex_list
            state.master.occupation = occupation_list
            state.master.traffic = traffic_list

            return state.master
        }
    },
    mutations:{

    },
    actions:{

   }
}

export default master
