<template>
    <div class="flex flex-col w-full lg:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0 lg:border-r">
        <div class="flex-shrink-0 px-4 lg:px-8 pt-4 flex flex-row items-center justify-center">
            
            <inertia-link :href="route('dashboard')" class="no-underline flex flex-column justify-center">
                <img class="w-8 md:w-16 lg:w-20 m-auto" :src="'/'+options.logo" alt="">
                <div class="mt-3 text-xl font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">{{ options.web_title }}</div>
            </inertia-link>


            <button class="rounded-lg lg:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="showingNavigationDropdown = !showingNavigationDropdown">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path v-show="!showingNavigationDropdown" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path v-show="showingNavigationDropdown" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div v-show="showingNavigationDropdown" @click="showingNavigationDropdown = false" class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>
        
        <nav :class="{'block': showingNavigationDropdown, 'hidden': !showingNavigationDropdown}" class="flex-grow lg:block px-4 pb-4 lg:pb-0 lg:overflow-y-auto z-10">
            
            <div class="navElement hover:bg-gray-200 rounded-lg">
                <inertia-link :class="route().current('options.show') ? 'bg-gray-200' : 'bg-transparent'" 
                    class="rounded-lg no-underline block pr-2 py-2 mt-2 text-base font-semibold dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline" 
                    :href="route('options.show')">
                    <i class="fa-solid fa-pen-ruler text-gray-900 pr-2"></i>
                    <span class="text-gray-900 text-base">Personalización</span>
                </inertia-link>
            </div>
            
            <hr>

            <div class="navElement hover:bg-gray-200 rounded-lg">
                <inertia-link :class="route().current('categories.show') ? 'bg-gray-200' : 'bg-transparent'" 
                    class="rounded-lg no-underline block pr-2 py-2 mt-2 text-base font-semibold dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline" 
                    :href="route('categories.show')">
                    <i class="fa-solid fa-book text-gray-900 pr-2"></i>
                    <span class="text-gray-900 text-base">Categorías</span>
                </inertia-link>
            </div>

            <div class="navElement hover:bg-gray-200 rounded-lg">
                <inertia-link :class="route().current('entries.show') ? 'bg-gray-200' : 'bg-transparent'" 
                    class="rounded-lg no-underline block pr-2 py-2 mt-2 text-base font-semibold dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline" 
                    :href="route('entries.show')">
                    <i class="fa-solid fa-pen-to-square text-gray-900 pr-2"></i>
                    <span class="text-gray-900 text-base">Entradas</span>
                </inertia-link>
            </div>

            <jet-bar-responsive-links />

        </nav>
        <div v-show="showingSidebarNavigationDropdown" @click="showingSidebarNavigationDropdown = false" class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>
    </div>
</template>

<script>
import JetBarResponsiveLinks from "@/Components/JetBarResponsiveLinks.vue";
export default {
    name: "JetBarSidebar",
    components: {JetBarResponsiveLinks},
    data() {
        return {
            showingNavigationDropdown: false,
            showingSidebarNavigationDropdown: false,
        }
    },
}
</script>

<script setup>
    const props = defineProps({
        options: Object,
    });
</script>

<style>
@tailwind base;
@tailwind components;
@tailwind utilities;
</style>