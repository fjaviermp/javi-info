<script setup>
    const props = defineProps({
        title: String,
        subtitle: String,
        btnText: String,
        image: String
    });
</script>

<template>
    <section class="" id="landscape-image">
        <div alt="Portada" class="landscape-file img-fluid" v-bind:style="{ backgroundImage: 'url(' + image + ')' }"></div>

        <div v-if="title" class="image-text">
            <h1>{{ title }}</h1>
            <p>{{ subtitle }}</p>
            <a :href="btnText" class="btn btn-primary btn-lg">{{ btnText }}</a>
        </div>
        <template v-else>

        </template>
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
        color: #fff;
        text-align: center;
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