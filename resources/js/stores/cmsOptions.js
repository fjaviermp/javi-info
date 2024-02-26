import { defineStore } from 'pinia'

export const useCmsOptionsStore = defineStore('cmsOptions', {
  state: () => ({
    options: [],
  }),
  getters: {
    getAllOptions(state) {
      if (Object.keys(state.options).length > 0 && state.options !== undefined) {
        return state.options
      } else {
        return JSON.parse(localStorage.getItem('options'));
      }
    },
    getBackGroundMainColor(state) {
      return `background-color:  ${localStorage.getItem('main_color')}`;
    },
  },
  actions: {
    setAllOptions(newOptions) {
      this.options = newOptions;
      localStorage.setItem('options', JSON.stringify(newOptions));
      for (const [key, value] of Object.entries(newOptions)) {
        localStorage.setItem(key, value);
      }
    },
  },
})