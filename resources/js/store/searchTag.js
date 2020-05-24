import search from './search.js';
import master from './master.js';


const searchTag = {
    namespaced: true,
    state:{
        searchTag:{
            'person_name':'',
            'sex':'',
            'occupation':'',
            'traffic':[]
        },
        is_show_tag:false
    },
    getters:{
        getSearchTag(state) {
            return state.searchTag;
        },
        getShowTag(state) {
            return state.is_show_tag;
        }
    },
    mutations:{
        setSearchTag(state, {prop, value}) {

            let masterData = master.state.master
            let searchStr = '';
            switch (prop) {
                case 'sex':
                case 'occupation':
                    searchStr = masterData[prop][value];
                    break;
                case 'traffic':
                    let tmpArr = [];
                    value.map((v)=>{
                        let selectVal2 = masterData[prop][v]
                        tmpArr.push(selectVal2)
                    });
                    searchStr = tmpArr;
                    break;
                default:
                    searchStr = value;
                    break;
            }
            state.searchTag[prop] = searchStr;
        },
        setShowTag(state, is_show_tag) {
            state.is_show_tag = is_show_tag
        }
    },
    actions:{

    }
}

export default searchTag
