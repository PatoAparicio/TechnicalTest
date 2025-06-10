import { http, API_BASE_URL } from "./Http";

export const calculate = (data) => {
    return http().post(`${API_BASE_URL}v1/problem-1`, data);
};