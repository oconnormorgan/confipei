/**
 * 
 * Gérer nos rêquetes qui vont vers nos API
 */

import axios from "axios"
import { authenticationService } from "./authentication.service"

export const apiServices = {
    get(url, data = {}) {
        return axios({
            method: 'get',
            url: url,
            params: data,
            headers: headers(),
        })
    },
    post(url, data = {}) {
        return axios({
            method: 'post',
            url: url,
            params: data,
            headers: headers(),
        })
    }
}

function headers() {
    const currentUser = authenticationService.currentUserValue || {};
    const authHeader = currentUser.token ? {
        'Authorization': 'Bearer ' + currentUser.token
    } : {}
    return {
        ...authHeader,
        'Content-Type': 'application/json'
    }
}