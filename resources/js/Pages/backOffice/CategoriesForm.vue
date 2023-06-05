<template>
    <app-layout v-bind:options="options">
        <Head :title="('Categorías')"></Head>

        <template #header>
            Editar categoria
        </template>

        <jet-bar-container>
            <div class="mt-1 md:mt-0 md:col-span-2">
                <form @submit.prevent="submit">
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-4 sm:col-span-1">
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                        <span>ID:</span>
                                </label>
                                <input
                                    class="disabled:opacity-50 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    name="id" id="id" type="text" disabled="disabled"  v-model="form.id">
                            </div>

                            <div class="col-span-4 sm:col-span-1">
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                        <span>Activado/Bloqueado:</span>
                                </label>
                                <div class="flex items-center h-100">
                                    <input v-model="form.checked" name="enabled" id="enabled" type="checkbox" class="mr-3 w-4 h-4 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                    <jet-bar-badge v-show="form.checked" text="Activado" type="success" />
                                    <jet-bar-badge v-show="!form.checked" text="Desactivado" type="danger" /> 
                                </div>
                            </div>

                            <div class="col-span-4 sm:col-span-1">
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                        <span>Destacado en menu:</span>
                                </label>
                                <div class="flex items-center h-100">
                                    <input v-model="form.main" name="main" id="main" type="checkbox" class="mr-3 w-4 h-4 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                    <jet-bar-badge v-show="form.main" text="Destacado" type="success" />
                                    <jet-bar-badge v-show="!form.main" text="No destacado" type="danger" /> 
                                </div>
                            </div>

                            <div class="col-span-4 sm:col-span-3">
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                        <span>Nombre</span>
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    name="name" id="name" type="text" autocomplete="name" v-model="form.name">
                            </div>

                            <div class="col-span-4 sm:col-span-6">
                                <label class="block font-medium text-sm text-gray-700" for="desc">
                                    <span>Descripción</span>
                                </label>
                                <input 
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    name="desc" id="desc" type="text" autocomplete="username" v-model="form.desc">
                            </div>

                        </div>
                    </div>

                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        <div class="mr-3">
                            <div class="text-sm text-gray-600" style="display: none;">
                                Saved. 
                            </div>
                        </div>

                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </jet-bar-container>

    </app-layout>
</template>


<script setup>
    const props = defineProps({
        options: Object,
        category: Object,
        pillComponent: String,
    });

    var check = false;
    if (props.category[0].active == 1)
        check = true

    var inMenu = false;
    if (props.category[0].main == 1)
        inMenu = true
    
    const form = useForm({
        id: props.category[0].id,
        name: props.category[0].name,
        desc: props.category[0].desc,
        checked: check,
        main: inMenu,
    })

    function submit() {
        router.post('/admin/categories/update/', form)
        console.log(form);
    }
</script>

<script>
import { Head } from '@inertiajs/vue3';

import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

import AppLayout from '@/Layouts/AppLayout.vue'
import JetBarContainer from "@/Components/backOffice/JetBarContainer.vue";
import JetBarAlert from "@/Components/backOffice/JetBarAlert.vue";
import JetBarStatsContainer from "@/Components/backOffice/Stat/JetBarStatsContainer.vue";
import JetBarStatCard from "@/Components/backOffice/Stat/JetBarStatCard.vue";
import JetBarTable from "@/Components/backOffice/Table/JetBarTable.vue";
import JetBarTableData from "@/Components/backOffice/Table/JetBarTableData.vue";
import JetBarBadge from "@/Components/backOffice/JetBarBadge.vue";
import JetBarIcon from "@/Components/backOffice/JetBarIcon.vue";

export default {
    components: {
        AppLayout,
        JetBarContainer,
        JetBarAlert,
        JetBarStatsContainer,
        JetBarStatCard,
        JetBarTable,
        JetBarTableData,
        JetBarBadge,
        JetBarIcon,
    },
    methods: {
    }
}
</script>