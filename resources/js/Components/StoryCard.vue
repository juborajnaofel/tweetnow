<template>
    <div
        class="reel-card border border-gray-200 dark:border-gray-700 rounded-md overflow-hidden shadow-sm relative"
        :class="randomBackgroundColorClass()"
    >
        <div class="p-5 overflow-hidden min-h-[200px] max-h-[200px]">
            <p class="text-gray-800 dark:text-gray-200 text-[9px]">
                {{ reel.content }}
            </p>
        </div>

        <div
            class="absolute left-0 top-0 flex items-center justify-between px-3 py-2 bg-slate-700 text-slate-100 w-full opacity-90"
        >
            <div class="flex items-center space-x-2">
                <img
                    :src="avatar"
                    alt="User Avatar"
                    class="w-6 h-6 rounded-full"
                />
                <span class="text-sm font-medium">{{ user.username }}</span>
            </div>
        </div>

        <div class="flex justify-between px-3 py-2">
            <button
                class="text-xs font-medium text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 focus:outline-none"
            >
                Like
            </button>
            <button
                class="text-xs font-medium text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 focus:outline-none"
            >
                Reply
            </button>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
const props = defineProps({
    reel: Object,
    user: Object,
});

const avatar =
    props.user.avatar ?? usePage().props?.configs?.user_fallback_image;

let lastColor = '';

function randomBackgroundColorClass() {
    const colors = [
        'bg-white',
        'bg-yellow-300',
        'bg-green-300',
        'bg-orange-300',
        'bg-pink-300',
        'bg-violet-300',
        'bg-blue-300',
    ];

    let randomIndex;
    do {
        randomIndex = Math.floor(Math.random() * colors.length);
    } while (colors[randomIndex] === lastColor);

    lastColor = colors[randomIndex];

    return lastColor;
}

props.reel.content =
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed diam ante, dapibus eget blandit sit amet, tristique id libero. Vestibulum eget risus purus. Etiam sodales neque eget libero fringilla, in vulputate nunc vehicula. Nam condimentum eros ut est varius, sit amet varius risus fermentum. Nullam malesuada, est sit amet maximus rutrum, nisi eros commodo eros, at placerat justo ipsum id sapien. Phasellus lacinia consequat turpis vitae tempus.';
</script>

<style scoped>
.reel-card {
    width: 265px;
    height: auto;
}
</style>
