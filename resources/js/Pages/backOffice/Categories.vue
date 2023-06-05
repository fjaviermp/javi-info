<template>
    <div v-show="this.popDelete" id="bgPopup">
        <div id="popup">
            <div id="popHeader" class="bg-gray-700 text-white p-3">
                <h1>Eliminar categoría</h1>
            </div>
            <div id="popContent" class="flex flex-column w-full justify-center m-auto w-5/6">

                <h2 class="text-center">¿Estás seguro de que deseas eliminar esta categoría?</h2>
                <h3 class="text-center">Si lo haces, no podrás recuperar sus datos y se perderán para siempre</h3>
                <h3 class="text-center">Además, las entradas de esta categoría pasarán a estar sin categoría y se quitarán del menu</h3>


                <div class="flex flex-row w-full justify-around mt-5">
                    <div class="flex justify-start">
                        <button @click="confirmDelete()" class="inline-flex items-center px-5 py-3 bg-red-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Cancelar</button>
                    </div>

                    <div class="flex justify-end">
                        <button @click="deleteCategory()" type="submit" class="inline-flex items-center px-5 py-3 bg-green-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <app-layout v-bind:options="options">
        <Head :title="('Categorías')"></Head>

        <template #header>
            Listado de categorías
        </template>


        <jet-bar-container>
            <inertia-link href="categories/create" class="mb-3 justify-end flex no-underline text-indigo-600 hover:text-indigo-900">
                <button class="p-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"><i class="fa-solid fa-plus"></i> | Crear CATEGORÍA</button>
            </inertia-link>

            <jet-bar-table :headers="['Nombre', 'Descripcion', 'Estado', '', '']" >
                <tr :id="'category'+category.id" class="hover:bg-gray-50" v-for="category in categories">
                    <jet-bar-table-data>
                        <span class="text-sm text-gray-900 font-semibold">{{ category.name }}</span>
                    </jet-bar-table-data>
                    <jet-bar-table-data>
                        <div v-if="category.desc.length > 71" class="text-sm text-gray-600">{{ category.desc.substr(0, 75) + " ..." }} </div>
                        <div v-else-if="category.desc.length <= 71 && category.desc.length > 0" class="text-sm text-gray-600">{{ category.desc }} </div>
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
                        <div @click="confirmDelete(category.id)" class="no-underline text-indigo-600 hover:text-indigo-900 hover:cursor-pointer">
                            <i class="fa-solid fa-trash-can text-red-600"></i>
                            <span class="text-red-600 pl-2">Eliminar</span>
                        </div>
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
    data() {
        return {
            popDelete: false,
            idDelete: 0,
        }
    },
    methods: {
        confirmDelete(id){
            console.log(this.$page.props.csrf_token);
            if (!this.popDelete){
                this.popDelete = true;
                this.idDelete = id;
            }else
                this.popDelete = false;
        },
        async deleteCategory(){
            this.popDelete = false;
            var id = this.idDelete
            
            fetch("/admin/categories/delete/", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    "id": id,
                    "_token": this.$page.props.csrf_token,
                })

            })
            .then(response => {
                document.getElementById("category"+id).remove();
            })
        }
    }
}
</script>

<style scoped>
    #bgPopup{
        width: 100%;
        height: 100%;
        position: fixed;
        z-index: 999;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #popup{
        width: 50%;
        height: 60%;
        z-index: 1000;
        position: relative;
        margin: 0 auto;
        background-color: white;
        border-radius: 5px;
        display: flex;
        flex-direction: column;
    }
</style>
