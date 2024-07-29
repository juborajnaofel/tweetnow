<script setup>
import TNowButton from "@/Components/TNButton.vue";
import { Link, usePage } from "@inertiajs/vue3";
import moment from "moment";
import { ref } from "vue";

const menuShow = ref(false);

const formattedDate = (datetime) => {
    return moment(datetime).format("MMMM Do YYYY, h:mm:ss a");
};

const authId = usePage().props.auth.user.id;

const randomInt = (limit) => {
    return Math.floor(Math.random() * limit) + 1;
};

const props = defineProps({
    data: Object,
    auth: Object,
});
</script>

<template>
    <div class="max-w-full mb-4 mx-auto">
        <div class="relative">
            <ul class="absolute right-0 top-4 mt-2 w-20 bg-white dark:bg-gray-900 rounded-md shadow-lg" :class="{ 'block': menuShow, 'hidden': !menuShow }">
                <li v-if="authId === data.user_id">
                    <a href="#" class="block px-4 py-1 text-xs text-gray-800 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-800 hover:text-gray-900 dark:hover:text-gray-400 rounded-t-md">Delete</a>
                </li>
                <li v-if="authId === data.user_id">
                    <a href="#" class="block px-4 py-1 text-xs text-gray-800 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-800 hover:text-gray-900 dark:hover:text-gray-400">Edit</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-1 text-xs text-gray-800 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-800 hover:text-gray-900 dark:hover:text-gray-400 rounded-b-md">Report</a>
                </li>
            </ul>
        </div>

        <div class="mx-2 bg-gray-900 dark:bg-gray-800 border-2 border-gray-800 dark:border-gray-700 overflow-hidden shadow-sm rounded-lg">
            <div class="text-white">
                <div class="flex justify-between items-center px-4 py-2">
                    <div class="flex flex-col">
                        <Link :href="route('profile.view', data.user.id)">
                            <span class="font-bold text-sm hover:underline">{{ data.user.name }}</span>
                        </Link>
                        <span class="text-xs text-gray-400">{{ formattedDate(data.created_at) }}</span>
                    </div>
                    <button @click="menuShow = !menuShow" class="text-gray-400 hover:text-white focus:outline-none">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                </div>

                <p class="px-4 py-2 text-sm text-gray-300">{{ data.content }}</p>

                <div class="flex justify-between items-center px-4 py-2 border-t border-gray-800 dark:border-gray-700">
                    <div class="flex gap-2">
                        <TNowButton class="text-gray-400 hover:text-white">
                            <span class="pr-1">&#x1F44D;</span> Like: {{ randomInt(100) }}
                        </TNowButton>
                        <TNowButton class="text-gray-400 hover:text-white">
                            <span class="pr-1">&#x1F4AC;</span> Comment: {{ randomInt(100) }}
                        </TNowButton>
                        <TNowButton class="text-gray-400 hover:text-white">
                            <span class="pr-1">&#x1F4E2;</span> Share: {{ randomInt(100) }}
                        </TNowButton>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
