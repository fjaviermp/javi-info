<script setup>
    import { Head, Link } from '@inertiajs/vue3';
    import Navbar from '../../Components/frontOffice/Navbar.vue'
    import Footer from '../../Components/frontOffice/Footer.vue'
    import Landscape from '../../Components/frontOffice/Landscape.vue'
   
    const props = defineProps({
            options: Object,
            categories: Object,
            entry: Object,
    });
</script>

<template>
    <Head :title="(entry.name)"></Head>
    <Navbar :categories="categories" :title="options.web_title"></Navbar>
    <Landscape :image="'../img/'+options.home_image"></Landscape>
    <Footer></Footer> 
</template>