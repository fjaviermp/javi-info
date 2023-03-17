<script setup>
    const props = defineProps({
        title: String,
        subtitle: String,
        btnText: String,
        image: String
    });

    const bgImg = "url("+props.image+")";
</script>
<script>
    export default{
        props: ['title','subtitle','btnText','image'],
    }
</script>

<template>
    <section class="" id="landscape-image">
        <div alt="Portada" class="landscape-file img-fluid"></div>

        <div class="image-text">
            <h1>{{ title }}</h1>
            <p>{{ subtitle }}</p>
            <a href="#" class="btn btn-primary btn-lg">{{ btnText }}</a>
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
        color: #fff;
        text-align: center;
    }

    /* ESTO ES PARA QUE LA IMAGEN ESTE QUIETA Y OCUPE EL 100%*/
    #landscape-image, .landscape-file{
        width: 100%;
        height: 95vh;
    }

    .landscape-file{
        background-image: v-bind(bgImg);
        background-attachment: fixed;
        background-position: center;
    }
</style>