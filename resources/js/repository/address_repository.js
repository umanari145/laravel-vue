
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

    async searchCity(pref_cd) {
        let link = `/api/getCity?pref_cd=${pref_cd}`
        return new Promise((resolve, reject) => {
            axios.get(link).then((response) => {
                resolve(response)
            }).catch((error) => {
                reject(error)
            })
        })
    }

    async searchTown(pref_cd, city_cd) {
        let link = `/api/getTown?pref_cd=${pref_cd}&city_cd=${city_cd}`
        return new Promise((resolve, reject) => {
            axios.get(link).then((response) => {
                resolve(response)
            }).catch((error) => {
                reject(error)
            })
        })
    }

}
