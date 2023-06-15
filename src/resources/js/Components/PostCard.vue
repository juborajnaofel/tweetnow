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
    data: Object,
});
</script>

<template>
    <div class="max-w-full mb-4 mx-auto px-2">
        <div
            class="bg-slate-100 border-2 border-slate-200 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
            <div class="p-5 text-gray-900 dark:text-gray-100">
                <span class="font-bold">{{ data.user.name }}</span>
                <br /><span>{{ formattedDate(data.created_at) }}</span>
                <!-- <span class="text-xs p-2" v-if="data.user.name">✔</span> -->
                <p class="py-5">
                    {{ data.content }}
                </p>
                <hr />
                <div class="flex flex-row flex-wrap gap-3 pt-3">
                    <TNowButton> Like: {{ randomInt(100) }} </TNowButton>
                    <TNowButton> Comment: {{ randomInt(100) }} </TNowButton>
                    <TNowButton> Share: {{ randomInt(100) }} </TNowButton>
                </div>
            </div>
        </div>
    </div>
</template>
