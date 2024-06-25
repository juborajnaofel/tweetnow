<script setup>
import { ref } from 'vue';

const classes =  ref("text-xs py-1 px-3 rounded-xl bg-slate-300 text-slate-600 font-bold");
const props = defineProps({
    variant: String,
});
</script>

<template>
    <button
        :class="classes"
    >
        <slot/>
    </button>
</template>
