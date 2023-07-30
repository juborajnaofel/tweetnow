<script setup>
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const logo = ref(usePage().props.configs.logo)

</script>

<template>
    <img :src="logo" alt="Logo">
</template>
