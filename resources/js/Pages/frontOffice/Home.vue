<script setup>
  import { Head, Link } from '@inertiajs/vue3';
  import {onBeforeMount } from 'vue';
  import { useCmsOptionsStore } from '../../stores/cmsOptions'
  import Navbar from '../../Components/frontOffice/Navbar.vue'
  import Landscape from '../../Components/frontOffice/Landscape.vue'
  import Footer from '../../Components/frontOffice/Footer.vue'
  import Characteristics from '../../Components/frontOffice/Characteristics.vue'
  import About from '../../Components/frontOffice/About.vue'
    
  const props = defineProps({
    options: Object,
    categories: Object,
  });

  const customizationOptions = useCmsOptionsStore();

  onBeforeMount(() => {
    customizationOptions.setAllOptions(props.options);
  });
</script>

<template>
  <Head :title="('Inicio')"></Head>
  <Navbar :categories="categories" :title="options.web_title"></Navbar>
  <Landscape
    :main-color="options.main_color"
    :title="options.home_title"
    :subtitle="options.home_subtitle"
    :btnText="options.home_btnText"
    :btnUrl="options.home_btnUrl"
    :image="'../img/'+options.home_image">
  </Landscape>
    <section class="features-section">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <Characteristics :icon="options.home_btn1_icon" :title="options.home_btn1_title" :text="options.home_btn1_text"></Characteristics>
          <Characteristics :icon="options.home_btn2_icon" :title="options.home_btn2_title" :text="options.home_btn2_text"></Characteristics>
          <Characteristics :icon="options.home_btn3_icon" :title="options.home_btn3_title" :text="options.home_btn3_text"></Characteristics>
        </div>
      </div>
    </section>
  <About></About>
  <Footer></Footer>
</template>

<style>
    section .feature{
        padding: 1em;
        margin: 1em;
        background-color: white;
        border-radius: 25px;
    }

    /* Cambiar el color de fondo del encabezado */
    .header-section {
        background-color: #212529;
    }
    
    /* Cambiar el color del texto del encabezado */
    .header-section h1,
    .header-section h2 {
        color: #fff;
    }
    
    /* Cambiar el color de fondo de la sección de características */
    .features-section {
        background-color: #f8f9fa;
    }
    
    /* Cambiar el color del texto de las características */
    .features-section h3 {
        color: #212529;
    }
    
    /* Cambiar el color del icono de las características */
    .features-section .feature-icon {
        color: #dc3545;
    }
        
    @media (max-width: 767px) {
        section .feature{
            padding: 1em;
            margin: 1em 2em 1em 2em;
            background-color: white;
            border-radius: 25px;
            flex-shrink: 1;
        }
    }
</style>