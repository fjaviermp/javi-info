<script setup>
    import { Link } from '@inertiajs/vue3';

    const props = defineProps({
        title: String,
    });
</script>
<script>
    export default{
        props: ['title'],
    }
</script>
<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            
            <a class="navbar-brand" href="#">{{title}}</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" :href="('/contacto')">Contacto</Link>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</template>
<style>
</style>