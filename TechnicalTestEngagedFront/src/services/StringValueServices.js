import { http, API_BASE_URL } from "./Http";

export const calculate2 = (data) => {
     return http().post(`${API_BASE_URL}v1/problem-2`, { 
        t: data 
    });
};