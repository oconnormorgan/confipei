/**
 * 
 * Gérer nos rêquetes qui vont vers nos API
 */

import axios from "axios"
import { authenticationService } from "./authentication.service"

export const apiServices = {
    get(url, params = {}) {
        return axios({
            method: 'get',
            url: url,
            params: params,
            headers: headers(),
        })
    },
    post(url, datas = {}) {
        return axios({
            method: 'post',
            url: url,
            data: JSON.stringify(datas),
            headers: headers(),
        })
    }
}

function headers() {
    const currentUser = authenticationService.currentUserValue || {};
    const authHeader = currentUser.token ? { 'Authorization': 'Bearer ' + currentUser.token } : {}
    return {
        ...authHeader,
        'Content-Type': 'application/json'
    };
         
    
}