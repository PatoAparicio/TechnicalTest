import axios from 'axios';

export const API_BASE_URL = import.meta.env.VITE_BASE_API_URL; 

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