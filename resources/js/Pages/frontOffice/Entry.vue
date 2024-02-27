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
    <section id="entryBody" v-bind:style="{ backgroundImage: 'url(../img/../img/' + options.home_image + ')' }">
      <div class="layer"></div>
      <div id="entryDiv">
        <div id="entryContent" v-html="entry.content"></div>
      </div>
    </section>
  <Footer></Footer> 
</template>

<style>
  #entryBody, #entryDiv, #entryBody .layer{
    min-height: 95vh;
  }
  #entryBody .layer {
    background-color: rgba(255, 255, 255, 0.5);
    position: absolute;
    width: 100%;
  }
  #entryDiv{
    padding: 2em;
    position: relative;
    width: 70%;
    height: 100%;
    background: white;
    margin: 0 auto;
  }
  #entryContent img{
    max-width: 100%;
    max-height: 100%;
  }
</style>