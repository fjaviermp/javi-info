<script setup>
    import { Link } from '@inertiajs/vue3';

    const props = defineProps({
        title: String,
        subtitle: String,
        btnText: String,
        btnUrl: String,
        image: String,
        mainColor: String,
    });
</script>

<template>
    <section id="landscape-image">
        <div alt="Portada" class="landscape-file img-fluid" v-bind:style="{ backgroundImage: 'url(./img/' + image + ')' }"></div>

        <div v-if="title" class="image-text">
            <h1 class="homeTitle">{{ title }}</h1>
            <p class="homeSubtitle">{{ subtitle }}</p>
            <Link :style="`background-color: ${mainColor}`" :href="btnUrl" class="btn btn-lg text-white">{{ btnText }}</Link>
        </div>
        <div v-else class="slotDiv">
            <slot />
        </div>
    </section>
</template>
<style>
    #landscape-image{
        margin-top: 0;
    }
    /* Agregar superposición absoluta al contenido de texto */
    .image-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
        text-align: center;
    }

    .slotDiv{
        width: 100%;
        top: 0;
        position: absolute;
        z-index: 1;
        display: flex;
        justify-content: center;
    }

    .homeTitle, .homeSubtitle{
        color: #fff;
    }

    /* ESTO ES PARA QUE LA IMAGEN ESTE QUIETA Y OCUPE EL 100%*/
    #landscape-image, .landscape-file{
        width: 100%;
        height: 95vh;
    }

    .landscape-file{
        background-attachment: fixed;
        background-position: center;
    }
</style>