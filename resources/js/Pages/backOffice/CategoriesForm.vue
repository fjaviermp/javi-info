<template>
    <app-layout v-bind:options="options">
        <Head :title="('Categorías')"></Head>

        <template #header>
            Editar categoria
        </template>

        <jet-bar-container>
            <div class="mt-1 md:mt-0 md:col-span-2">
                <form>
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-4 sm:col-span-2">
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                        <span>ID:</span>
                                </label>
                                <input
                                    class="disabled:opacity-50 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    id="id" type="text" disabled="disabled"  v-model="form.id">
                            </div>

                            <div class="col-span-4 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                        <span>Nombre</span>
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    id="name" type="text" autocomplete="name" v-model="form.name">
                            </div>

                            <div class="col-span-4 sm:col-span-6">
                                <label class="block font-medium text-sm text-gray-700" for="desc">
                                    <span>Descripción</span>
                                </label>
                                <input 
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    id="desc" type="text" autocomplete="username" v-model="form.desc">
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
    });
    
    const form = useForm({
        id: "3",
        name: "si",
        desc: "Si y solo si",
    })
</script>

<script>
import { Head } from '@inertiajs/vue3';

import { useForm } from '@inertiajs/vue3'

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
}
</script>