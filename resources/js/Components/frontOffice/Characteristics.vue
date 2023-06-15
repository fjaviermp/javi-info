<script setup>
    const props = defineProps({
            icon: String,
            title: String,
            text: String
    });
</script>

<template>
    <div class="feature col-md-3">
        <div class="feature-item text-center">
            <div class="feature-icon">
                <i :class="icon"></i>
            </div>
            <h3>{{ title }}</h3>
            <p>{{ text }}</p>
        </div>
    </div>
</template>