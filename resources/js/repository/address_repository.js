
export default class address_repository{

    constructor() {

    }

    async getPref() {
        let link = `/api/getPref`
        return new Promise((resolve, reject) => {
            axios.get(link).then((response) => {
                resolve(response)
            }).catch((error) => {
                reject(error)
            })
        })
    }

    async getCity(pref_cd) {
        let link = `/api/getPref`
        return new Promise((resolve, reject) => {
            axios.get(link).then((response) => {
                resolve(response)
            }).catch((error) => {
                reject(error)
            })
        })
    }

    async getPref() {
        let link = `/api/getPref`
        return new Promise((resolve, reject) => {
            axios.get(link).then((response) => {
                resolve(response)
            }).catch((error) => {
                reject(error)
            })
        })
    }

}
