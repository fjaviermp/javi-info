<template>
    <app-layout v-bind:options="options">
        <Head :title="('Entradas')">
            <meta name="csrf-token" :content="this.$page.props.csrf_token">
        </Head>

        <template #header>
            <div v-if="props.entry">
                Editar Entrada
            </div>
            <div v-else>
                Crear Entrada
            </div>
        </template>

        <jet-bar-container>
            <div class="mt-1 md:mt-0 md:col-span-2">
                <form @submit.prevent="submit">
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-3 sm:col-span-1">
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                        <span>ID:</span>
                                </label>
                                <input
                                    class="disabled:opacity-50 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    name="id" id="id" type="text" disabled="disabled"  v-model="form.id">
                            </div>

                            <div class="col-span-3 sm:col-span-1 flex flex-column justify-between wrap flex-column">
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                        <span>Categoria</span>
                                </label>
                                <select required="required" v-model="form.category" id="category" name="category" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option v-for="category in categories"  :value="category.id">{{ category.name }}</option>
                                </select>
                            </div>

                            <div class="col-span-4 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                        <span>Nombre</span>
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    required="required" name="name" id="name" type="text" autocomplete="name" v-model="form.name">
                            </div>

                            <div class="col-span-4 sm:col-span-6">
                                <label class="block font-medium text-sm text-gray-700" for="desc">
                                    <span>Descripción</span>
                                </label>
                                <input 
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    required="required" name="desc" id="desc" type="text" autocomplete="desc" v-model="form.desc">
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                <QuillEditor contentType="html" v-model:content="form.content" :modules="modules" :toolbar="toolbar" theme="snow" />
                            </div>

                        </div>
                    </div>

                    <div class="flex justify-between px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        
                        <inertia-link href="/admin/entries" class="justify-start flex no-underline text-indigo-600 hover:text-indigo-900">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Cancelar</button>
                        </inertia-link>

                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Guardar</button>
                        </div>
                    </div>

                </form>
            </div>
        </jet-bar-container>

    </app-layout>
</template>


<script setup>
    const props = defineProps({
        options: Object,
        entry: Object,
        categories: Object,
    });
    
    if (props.entry) {
        var formId = props.entry[0].id
        var formName = props.entry[0].name
        var formCategory = props.entry[0].category
        var formDesc = props.entry[0].desc
        var formContent = props.entry[0].content
    }  

    const form = useForm({
        id: formId,
        name: formName,
        desc: formDesc,
        content: formContent,
        category: formCategory,
    })  


    function submit() {
        if (props.entry)
            router.post('/admin/entries/update/', form)
        else
            router.post('/admin/entries/insert/', form)
    }
</script>

<script>
import { Head } from '@inertiajs/vue3';

import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

import axios from 'axios';

import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import ImageUploader from 'quill-image-uploader';
import 'quill-image-uploader/dist/quill.imageUploader.min.css';

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
        QuillEditor,
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
            modules: {
                name: 'imageUploader',
                module: ImageUploader,
                options: {
                    upload: file => {
                        var formData = new FormData();
                        formData.append("image", file);
                        
                        fetch(`/admin/images/upload/`, {
                            method: 'POST',
                            body: formData
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            console.log(data);
                            //Borramos la animacion de subida por defecto del modulo
                            let uploading = document.getElementsByClassName("image-uploading");
                            while(uploading.length > 0){
                                uploading[0].parentNode.removeChild(uploading[0]);
                            }
                            //Nueva imagen se aniade de forma manual
                            var img = document.createElement("img");
                            img.src = "/img/assets/" + data.imgName;
                            document.getElementsByClassName("ql-editor")[0].appendChild(img);;
                        })
                        .catch(error => console.log(error));
                        
                    }
                },
            },
            toolbar: [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['link', 'image'],
                ['blockquote', 'code-block'],
                [{ 'script': 'sub'}, { 'script': 'super' }],

            ]
        }
    },
}
</script>