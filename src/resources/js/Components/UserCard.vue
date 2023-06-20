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
    <div class="max-w-full mb-2 mx-auto">
        <div
            class="bg-slate-100 border-2 border-slate-200 dark:bg-gray-800 overflow-hidden shadow-sm rounded-2xl"
        >
            <div class="py-1 text-gray-900 dark:text-gray-100">
                <div class="font-bold text-sm px-2">{{ name }}</div>
                <hr>
                <div class="flex flex-row flex-wrap gap-1 px-1 mt-1">
                    <TNowButton>Follow</TNowButton>
                    <div class="text-xs py-1">
                        Followed by {{ randomInt(100000) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
