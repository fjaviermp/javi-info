<script setup>
    import { Link } from '@inertiajs/vue3';
    const props = defineProps({
        title: String,
        categories: Object,
    });
</script>

<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">

            <Link class="navbar-brand" :href="('/')">{{title}}</Link>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <template v-for="category in categories" :key="category.id">
                        <li v-if="category.subcats.length == 0 && category.entries.length == 0" class="nav-item">
                            <Link class="nav-link" :href="('/'+category.slug)">{{ category.name }}</Link>
                        </li>

                        <li v-else class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ category.name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li v-for="subcat in category.subcats" :key="subcat.id">
                                    <Link class="dropdown-item" :href="('/'+category.slug+'/'+subcat.slug)">{{ subcat.name }}</Link>
                                </li>
                                <li v-for="entry in category.entries" :key="entry.id">
                                    <Link class="dropdown-item" :href="('/post/'+entry.slug)">{{ entry.name }}</Link>
                                </li>
                            </ul>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
    </nav>
</template>