<script>
    export default ({
        async setup() {
            const landscape = await fetch("/getoptions")
                .then(res => res.json())
                .then(res => res)
            return {
                landscape
            }
        },
    })

</script>

<template>
    <section class="" id="landscape-image">
        <div alt="Portada" class="landscape-file img-fluid" v-bind:style="{ backgroundImage: 'url(' + landscape.home_image + ')' }"></div>

        <div class="image-text">
            <h1>{{ landscape.home_title }}</h1>
            <p>{{ landscape.home_subtitle }}</p>
            <a :href="landscape.home_btnLink" class="btn btn-primary btn-lg">{{ landscape.home_btnText }}</a>
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
        background-attachment: fixed;
        background-position: center;
    }
</style>