import axios from "axios";
import Cookies from "js-cookie";
import * as types from "../mutations_types";

// state
const state = {
    user: null,
    token: Cookies.get("token"),
    auth_err: null,
    loading: false,
    isLogged: false
}

// getters
const getters = {
    user: state => state.user,
    token: state => state.token,
    check: state => state.isLogged,
    authError: state => state.auth_err,
    isLoading: state => state.loading
}

// mutations
const mutations = {
    [types.LOGIN](state) {
        state.loading = true;
        state.auth_err = null;
        state.isLogged = false;
    },
    [types.LOGIN_SUCCESS](state, { token,user, rembmer }) {
        state.loading = false;
        state.auth_err = null;
        state.user = user;
        state.token = token;
        state.isLogged = true;
        axios.defaults.headers.common['Authorization'] = 'Bearer '+token
        Cookies.set("token", token, { expires: rembmer ? 365 : null });
    },
    [types.LOGIN_FAILED](state, { error }) {
        state.loading = false;
        state.auth_err = error;
        state.isLogged = false;
        axios.defaults.headers.common['Authorization'] = null
    },
    [types.UPDATE_DATA](state, res) {
        state.user={...state.user,name:res.user.name,phone:res.user.phone}
    },
    [types.FETCH_USER_SUCCESS](state, user) {
        state.user = user;        
        state.isLogged = true;
    },
    [types.FETCH_USER_FAILURE](state) {
        state.token = null;
        Cookies.remove("token");
        state.isLogged = false;
    },
    [types.LOGOUT](state) {
        state.user = null;
        state.token = null;
        Cookies.remove("token");
        state.isLogged = false;
        axios.defaults.headers.common['Authorization'] = null
    }
};

// actions
const actions = {
    login({commit}) {
        commit(types.LOGIN);
    },
    logout({commit}) {
        commit(types.LOGOUT);
    },
    async fetchUser({commit}) {
        axios.defaults.baseURL = '/api/v1/profile'; 
        axios.defaults.headers.common['Authorization'] = 'Bearer '+state.token
        await axios.get('/').then(response => {
            commit(types.FETCH_USER_SUCCESS, response.data.user)
        }).catch((error) => {
            commit(types.FETCH_USER_FAILURE)
        });
        axios.defaults.baseURL = '/api/v1/admin'; 
    },
}

export default  {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}
