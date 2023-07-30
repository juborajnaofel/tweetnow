<script setup>
import TNowButton from "@/Components/TNButton.vue";
import { usePage } from "@inertiajs/vue3";
import moment from "moment";
import { ref } from "vue";

const menuShow = ref(false);

const formattedDate = (datatime) => {
    return moment(datatime).format("MMMM Do YYYY, h:mm:ss a");
};

const auth_id = usePage().props.auth.user.id;

const randomInt = (limit) => {
    return Math.floor(Math.random() * limit) + 1;
};

const props = defineProps({
    data: Object,
    auth: Object,
});

</script>

<template>
    <div class="max-w-full mb-2 mx-auto mx-[10px]">
        <div class="relative">
            <ul
                class="absolute right-0 top-4 mt-2 w-20 bg-white rounded-md shadow-lg"
                :class="menuShow ? '' : 'hidden'"
            >
                <li v-if="auth_id == data.user_id">
                    <a href="#" class="block px-4 py-1 text-xs text-gray-800">
                        Delete
                    </a>
                </li>
                <li v-if="auth_id == data.user_id">
                    <a href="#" class="block px-4 py-1 text-xs text-gray-800">
                        Edit
                    </a>
                </li>
                <li v-if="true">
                    <a href="#" class="block px-4 py-1 text-xs text-gray-800">
                        Report
                    </a>
                </li>
            </ul>
        </div>

        <div
            class="bg-slate-100 border-2 border-slate-200 dark:bg-gray-800 overflow-hidden shadow-sm rounded-2xl"
        >
            <div class="text-gray-900 dark:text-gray-100">
                <div class="flex flex-row justify-between px-1">
                    <div class="flex flex-col p-2">
                        <span class="font-bold">{{ data.user.name }}</span>
                        <span class="text-xs">
                            {{ formattedDate(data.created_at) }}
                        </span>
                    </div>

                    <span
                        @click="menuShow = !menuShow"
                        class="text-gray-800 text-xs font-semibold select-none cursor-pointer px-3"
                    >
                        ...
                    </span>
                </div>

                <!-- <span class="text-xs p-2" v-if="data.user.name">✔</span> -->
                <p class="pt-2 pb-3 px-3 text-sm">
                    {{ data.content }}
                </p>
                <hr />
                <div class="flex flex-row flex-wrap gap-3 p-1">
                    <TNowButton> Like: {{ randomInt(100) }} </TNowButton>
                    <TNowButton> Comment: {{ randomInt(100) }} </TNowButton>
                    <TNowButton> Share: {{ randomInt(100) }} </TNowButton>
                </div>
            </div>
        </div>
    </div>
</template>
