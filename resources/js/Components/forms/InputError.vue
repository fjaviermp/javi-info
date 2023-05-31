<script setup>
defineProps({
    message: String,
});
</script>

<template>
    <div v-show="message">
        <p id="inputFail">
            {{ message }}
        </p>
    </div>
</template>

<style>
    #inputFail{
        font-weight: bolder;
        font-size: larger;
        color: red;
        
    }  
</style>