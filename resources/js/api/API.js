import axios from "axios";

axios.defaults.headers.post['Content-Type'] = 'application/json';

function handleError(error) {
    if (error.response && error.response.status === 404) {
        location.href = '/404'
        return Promise.reject(error); // Re-reject the error for further handling
    }

    // Handle other errors (optional, could be a separate function)
    return Promise.reject(error);
}

axios.interceptors.response.use(undefined, handleError);




export default {
    axios() {
        return axios;
    },
}
