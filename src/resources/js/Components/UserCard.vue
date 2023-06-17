<script setup>
import TNowButton from "@/Components/TNButton.vue";
import moment from "moment";
const formattedDate = (datatime) => {
    return moment(datatime).format("MMMM Do YYYY, h:mm:ss a");
};

const randomInt = (limit) => {
    return Math.floor(Math.random() * limit) + 1;
};

const props = defineProps({
    name: String,
});
</script>

<template>
    <div class="max-w-full mb-4 mx-auto px-2">
        <div
            class="bg-slate-100 border-2 border-slate-200 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
            <div class="p-5 text-gray-900 dark:text-gray-100">
                <span class="font-bold">{{ name }}</span>
                <span class="text-xs p-2" v-if="true">✔</span><br>
                Followed by {{ randomInt(100000) }}
                <div class="flex flex-row flex-wrap gap-3 pt-3">
                    <TNowButton>Follow</TNowButton>
                </div>
            </div>
        </div>
    </div>
</template>