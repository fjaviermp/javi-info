import { defineStore } from 'pinia'

export const useCmsOptionsStore = defineStore('cmsOptions', {
  state: () => ({
    options: [],
  }),
  getters: {
    getAllOptions(state) {
      return state.options
    },
    getMainColor(state) {
      return state.options.main_color;
    },
    getBackGroundMainColor(state) {
      return `background-color: ${state.options.main_color}`;
    },
  },
  actions: {
    setAllOptions(newOptions) {
      this.options = newOptions;
    },
  },
})