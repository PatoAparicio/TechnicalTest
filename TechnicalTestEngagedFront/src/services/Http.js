import axios from 'axios';

export const API_BASE_URL = 'http://127.0.0.1:8000/api/'; 

export const http=()=> {
    const api = axios.create({
    baseURL: API_BASE_URL,
    headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json',
    },
    });
    return api;
}