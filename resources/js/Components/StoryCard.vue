<template>
    <div
        class="border border-gray-200 dark:border-gray-700 rounded-md overflow-hidden shadow-sm relative"
        :class="config.size"
        :style="{
            backgroundColor: post.background_color,
            color: post.text_color,
        }"
    >
        <div class="p-5 overflow-hidden">
            <p>
                {{ post?.content }}
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
                <span class="text-sm font-medium">{{ user?.name }}</span>
            </div>
        </div>

        <div class="px-3 py-2 absolute bottom-0 left-0">
            <div class="flex flex-row justify-between">
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
const props = defineProps({
    user: Object,
    post: Object,
    config: Object,
});

const avatar =
    props?.user?.avatar ?? usePage().props?.configs?.user_fallback_image;
</script>

<style scoped>
.lg {
    width: 400px;
    height: 400px;
    padding: 30px;
    font-size: 20px;
}

.md {
    width: 300px;
    height: auto;
}

.sm {
    width: 182px;
    height: 248px;
}
</style>
