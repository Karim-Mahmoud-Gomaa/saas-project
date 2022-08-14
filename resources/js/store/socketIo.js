// state
const state = {
    isConnected: false,
    messages: []
}

// getters
const getters = {
    messages: state => state.messages,
    isConnected: state => state.isConnected,
}

// mutations
const mutations = {
    SOCKET_CONNECT(state) {
        state.isConnected = true;
    },
    
    SOCKET_DISCONNECT(state) {
        state.isConnected = false;
    },
    
    SOCKET_MESSAGE(state, message) {
        state.socketMessage = message
    }
};

// actions
const actions = {
    connect({commit}) {
        commit(SOCKET_CONNECT);
    },
}

export default  {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}

