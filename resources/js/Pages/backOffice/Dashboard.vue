<template>
    <app-layout v-bind:options="options">
        <Head :title="('Administración')"></Head>

        <template #header>
            Resumen de la web
        </template>

        <jet-bar-container>
            <jet-bar-stats-container>
                <jet-bar-stat-card title="Categorias creadas" number="9" type="info">
                    <template v-slot:icon>
                        <jet-bar-icon type="users" fill />
                    </template>
                </jet-bar-stat-card>

                <jet-bar-stat-card title="Entradas Creadas" number="37" type="success">
                    <template v-slot:icon>
                        <jet-bar-icon type="users" fill />
                    </template>
                </jet-bar-stat-card>

                <jet-bar-stat-card title="Formularios pendientes" number="0" type="warning">
                    <template v-slot:icon>
                        <jet-bar-icon type="users" fill />
                    </template>
                </jet-bar-stat-card>
            </jet-bar-stats-container>

            <jet-bar-table :headers="['Nombre', 'Descripcion', 'Estado', '']" >
                <tr class="hover:bg-gray-50" v-for="index in 3" :key="index">
                    <jet-bar-table-data>
                        <span class="text-sm text-gray-900">Entrada de prueba {{ index }}</span>
                    </jet-bar-table-data>
                    <jet-bar-table-data>
                        <div class="text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit... </div>
                    </jet-bar-table-data>
                    <jet-bar-table-data>
                        <jet-bar-badge text="Activado" type="success" />
                    </jet-bar-table-data>
                    <jet-bar-table-data>
                        <inertia-link href="#" class="text-indigo-600 hover:text-indigo-900">Edit</inertia-link>
                    </jet-bar-table-data>
                </tr>
            </jet-bar-table>

        </jet-bar-container>

    </app-layout>
</template>


<script setup>
    const props = defineProps({
        options: Object,
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
