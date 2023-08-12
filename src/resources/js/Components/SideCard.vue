<script setup>
import TNowButton from "@/Components/TNButton.vue";
import { Link } from "@inertiajs/vue3";
import moment from "moment";
const formattedDate = (datatime) => {
    return moment(datatime).format("MMMM Do YYYY, h:mm:ss a");
};


const props = defineProps({
    title: String,
    content: Number,
    datatime: String
});
</script>

<template>
    <div class="max-w-full mb-2 mx-auto">
        <div
            class="bg-slate-100 border-2 border-slate-200 dark:bg-gray-800 overflow-hidden shadow-sm rounded-2xl"
        >
            <div class="p-3 text-gray-900 dark:text-gray-100">
                <slot></slot>
            </div>
        </div>
    </div>
</template>
