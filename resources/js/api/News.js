import axios from "axios";

const baseUrl = '/api/v1/news';

export default {

    news(page){
        return axios.get(`${baseUrl}?page=${page}`).then( response => {
            return response.data;
        })
    },

    item(url){
        return axios.get(`${baseUrl}/item/${url}`).then( response => {
            return response.data;
        })
    },

    changeStatus(id, data){
        return axios.put(`${baseUrl}/item/${id}/change-status`, data).then( response => {
            return response.data;
        })
    },

    options(){
        return axios.get(`${baseUrl}/options`).then( response => {
            return response.data;
        })
    },


}
