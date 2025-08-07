import {createStore} from "vuex";

const store = createStore({

    state () {
        return {
            user: null
        }
    },
    mutations: {
        setUser (state, user) {
            state.user = user
        }
    },
    getters: {
        user (state) {
            return state.user
        }
    }
})

export {store};
