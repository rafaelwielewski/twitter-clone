import { createStore } from "vuex";

const store = createStore({
  state: {
    count: 0,
    dark: false,
  },
  mutations: {
    SET_DARK: (state, bool) => {
      state.dark = bool;
    },
  },
  actions: {},
  getters: {
    dark: (state) => state.dark,
  } 
})

export default store



