<template>
  <Head :title="('Personalización')"></Head>
  <app-layout v-bind:options="options">
    <template #header>
      Personalización
    </template>

    <jet-bar-container>
      <form @submit.prevent="submit">
        <div class="card shadow p-4">
          <div class=" d-flex justify-content-center flex-row flex-wrap">
            <div v-for="option in formOptions" class="w-50 p-2">
              <label class="block font-medium text-sm text-gray-700" for="name">
                <span>{{ option.name }}:</span>
              </label>
              <input
                v-model="option.value"
                class="disabled:opacity-50 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                name="id" id="id" :type="option.type"
              >
            </div>
          </div>
          <div class="w-100 d-flex justify-content-center">
            <PrimaryButton
            >
              Guardar Cambios
            </PrimaryButton>
          </div>
        </div>
      </form>
    </jet-bar-container>
  </app-layout>
</template>

<script setup>
    const props = defineProps({
      options: Object,
      customization: Object,
    });
    
    const formOptions = ref(props.customization.filter((el) => el.type !== 'file'));
    const customizationOptions = useCmsOptionsStore();

    onBeforeMount(() => {
      customizationOptions.setAllOptions(props.options);
    });

    function submit() {
      const changedValues = [];
      formOptions.value.forEach(option => {
        if (option.value !== props.options[option.key]) {
          changedValues.push({
            id: option.id,
            key: option.key,
            value: option.value,
          });
          customizationOptions.setKeyValue(option.key, option.value);
        }
      });
      router.post('/admin/options/update/', changedValues);
    }
</script>

<script>
import { Head, router } from '@inertiajs/vue3';
import { onBeforeMount, ref } from "vue";
import PrimaryButton from '@/Components/forms/PrimaryButton.vue';
import { useCmsOptionsStore } from '../../stores/cmsOptions'
import AppLayout from '@/Layouts/AppLayout.vue'
import JetBarContainer from "@/Components/backOffice/JetBarContainer.vue";

export default {
  components: {
    AppLayout,
    JetBarContainer,
    Head,
    PrimaryButton,
  },
}
</script>
