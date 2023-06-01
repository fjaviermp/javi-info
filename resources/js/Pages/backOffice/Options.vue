<template>
    <app-layout v-bind:options="options">
        <template #header>
            Personalización
        </template>

        <jet-bar-container>
            <template>
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                    
                </div>
            </template>
        </jet-bar-container>
    </app-layout>
</template>

<script setup>
    const props = defineProps({
        options: Object,
    });
</script>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import JetBarContainer from "@/Components/backOffice/JetBarContainer.vue";

export default {
    components: {
        AppLayout,
        JetBarContainer,
    },
}
</script>
