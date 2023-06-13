<script setup>
const props = defineProps({
    data: Object,
});
</script>

<template>
    <div class="max-w-full my-4 mx-auto sm:px-6 lg:px-8">
        <div
            class="bg-slate-100 border-2 border-slate-200 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
            <div class="p-5 text-gray-900 dark:text-gray-100">
                <span class="font-bold">{{ data.userInfo.name }} </span>
                <span class="text-xs p-2" v-if="data.userInfo.is_verified">✔</span>
                <p class="py-5">
                    {{ data.postInfo.content }}
                </p>
                <hr>
                <div class="flex flex-row flex-wrap gap-3 pt-3">
                    <button class="text-xs py-1 px-6 rounded-md bg-slate-300 text-slate-600 font-bold">Likes: {{ data.postInfo.like_count }}</button>
                    <button class="text-xs py-1 px-6 rounded-md bg-slate-300 text-slate-600 font-bold">Comments: {{ data.postInfo.comment_count }}</button>
                    <button class="text-xs py-1 px-6 rounded-md bg-slate-300 text-slate-600 font-bold">Share: {{ data.postInfo.share_count }}</button>
                </div>
            </div>
        </div>
    </div>
</template>
