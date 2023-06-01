<template>
    <app-layout v-bind:options="options">
        <Head :title="('Categorías')"></Head>

        <template #header>
            Listado de categorías
        </template>

        <jet-bar-container>
            <jet-bar-table :headers="['Nombre', 'Descripcion', 'Estado', '', '']" >
                <tr class="hover:bg-gray-50" v-for="category in categories">
                    <jet-bar-table-data>
                        <span class="text-sm text-gray-900 font-semibold">{{ category.name }}</span>
                    </jet-bar-table-data>
                    <jet-bar-table-data>
                        <div v-if="category.desc" class="text-sm text-gray-600">{{ category.desc }} </div>
                        <div v-else class="text-sm font-bold text-red-600"> NO DISPONILE </div>
                    </jet-bar-table-data>
                    <jet-bar-table-data>
                        <jet-bar-badge v-if="category.active" text="Activado" type="success" />
                        <jet-bar-badge v-else text="Desactivado" type="danger" />
                    </jet-bar-table-data>
                    <jet-bar-table-data>
                        <inertia-link :href="route('categories.editForm', { id: category.id })" class="no-underline text-indigo-600 hover:text-indigo-900">
                            <i class="fa-solid fa-pencil"></i>
                            <span class="pl-2">Modificar</span>
                        </inertia-link>
                    </jet-bar-table-data>
                    <jet-bar-table-data>
                        <inertia-link href="#" class="no-underline text-indigo-600 hover:text-indigo-900">
                            <i class="fa-solid fa-trash-can text-red-600"></i>
                            <span class="text-red-600 pl-2">Eliminar</span>
                        </inertia-link>
                    </jet-bar-table-data>
                </tr>
            </jet-bar-table>
        </jet-bar-container>

    </app-layout>
</template>


<script setup>
    const props = defineProps({
        options: Object,
        categories: Object,
    });
</script>

<script>
import { Head } from '@inertiajs/vue3';

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
