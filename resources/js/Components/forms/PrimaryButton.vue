<script setup>
  import {onBeforeMount, ref } from 'vue';
  import { useCmsOptionsStore } from '../../stores/cmsOptions'

  defineProps({
    type: {
      type: String,
      default: 'submit',
    },
  });
  const customizationOptions = useCmsOptionsStore();

  const optionsSelected = ref([]);
  const mainColor = ref([]);
  onBeforeMount(() => {
    optionsSelected.value = customizationOptions.getAllOptions;
    mainColor.value = customizationOptions.getBackGroundMainColor;
  });
</script>

<template>
  <button
    :style="mainColor"
    :type="type" 
    class="button-primary inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
    @click="$emit('buttonClicked')"
    >
    <slot />
  </button>
</template>
