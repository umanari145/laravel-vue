const master = {
    namespaced: true,
    state:{
        master:{
            'sex':'',
            'occupation':'',
            'selected_occupation':'',
            'traffic_list':'',
            'baseball_team_list':'',
            'category_list':''
        }
    },
    getters:{
        getMaster(state) {
            let sex_list = {"1":"男", "2":"女"}
            let occupation_list = {"1":"学生", "2":"会社員", "3":"自営業・経営者"}
            let contact_list = {"1":"電話", "2":"メール"}
            let baseball_team_list = {"1":"巨人", "2":"阪神", "3":"西武"}
            let sub_occupation_list = {
                "1":{
                    "1-1":"中学生",
                    "1-2":"高校生",
                    "1-3":"大学生"
                },
                "2": {
                    "2-1":"中小企業",
                    "2-2":"上場企業"
                },
                "3": {
                    "3-1":"個人事業主",
                    "3-2":"中小企業",
                    "3-3":"上場企業"
                },
            }
            let traffic_list = {"1":"徒歩", "2":"自転車", "3":"バス", "4":"電車", "5":"その他"}
            let category_list = {"1":"食品", "2":"飲料", "3":"その他"}

            state.master.sex = sex_list
            state.master.occupation = occupation_list
            state.master.contact = contact_list
            state.master.sub_occupation = sub_occupation_list
            state.master.traffic = traffic_list
            state.master.baseball_team = baseball_team_list
            state.master.category = category_list

            return state.master
        },
        getProp(state, prop) {
            return state.master.prop
        },
    },
    mutations:{
        setProp(state, {prop, value}) {
            state.master[prop] = value
        }
    },
    actions:{

   }
}

export default master
