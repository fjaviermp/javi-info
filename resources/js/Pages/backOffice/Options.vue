<template>
    <Head :title="('Personalización')"></Head>
    <app-layout v-bind:options="options">
        <template #header>
            Personalización
        </template>

        <jet-bar-container>
            <form @submit.prevent="submit">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="grid grid-cols-6 gap-6">
                        
                        <div v-for="option in customization" class="col-span-4 sm:col-span-1">
                            <label class="block font-medium text-sm text-gray-700" for="name">
                                <span>{{ option.name }}:</span>
                            </label>
                            <input
                                v-model="option.value"
                                class="disabled:opacity-50 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                name="id" id="id" :type="option.type">
                        
                        </div>
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

    var formOpt = {};
    for (let i = 0; i < props.customization.length; i++) {
        formOpt[props.customization[i].key] = props.customization[i].value
    }

    const form = useForm(formOpt)  
    function submit() {
        router.post('/admin/options/update/', form)
    }
</script>

<script>
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import JetBarContainer from "@/Components/backOffice/JetBarContainer.vue";

export default {
    components: {
        AppLayout,
        JetBarContainer,
        Head,
    },
}
</script>
