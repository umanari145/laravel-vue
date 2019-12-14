
export default class member_repository{

    constructor() {

    }

    async getMembers() {
        let link = '/api/member/list'
        return new Promise((resolve, reject) => {
            axios.get(link).then((response) => {
                resolve(response)
            }).catch((error) => {
                reject(error)
            })
        })
    }

}
