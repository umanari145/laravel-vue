
export default class address_repository{
    //Promiseを内包しているのでreturn後に
    //then〜catch〜finallyを使える

    constructor() {

    }

    async getPref() {
        let link = `/api/getPref`
        return axios.get(link);
    }

    searchCity(pref_cd) {
        let link = `/api/getCity?pref_cd=${pref_cd}`
        return axios.get(link);
    }

    searchTown(pref_cd, city_cd) {
        let link = `/api/getTown?pref_cd=${pref_cd}&city_cd=${city_cd}`
        return axios.get(link);
    }

    getAddressByZip(zip) {
        let link = `/api/getAddress?zip=${zip}`
        return axios.get(link);
    }
}
