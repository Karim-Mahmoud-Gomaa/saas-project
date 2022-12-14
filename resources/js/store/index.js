import Vue from 'vue'
import Vuex from 'vuex'
import auth from './modules/auth'
import socket from './socketIo'

Vue.use(Vuex)

export default new Vuex.Store({
    modules:{
        auth,
        socket,
    }
})
 