<script setup>
import PostBox from "@/Components/PostBox.vue";
import PostCard from "@/Components/PostCard.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Feed" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Feed
            </h2>
        </template>

        <div class="py-12 flex flex-row justify-center px-5 md:px-0">
            <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">You're logged in!</div>
                </div>
            </div> -->
            <div class="flex flex-col md:flex-row max-w-7xl">
                <div class="w-full md:w-1/5">This is for sidebar</div>
                <div class="w-full md:w-4/5">
                    <PostBox />
                    <PostCard
                        v-for="(i, index) in [
                            1, 2, 3, 4, 5, 6, 7, 8, 9, 9, 0, 0, 0,
                        ]"
                        :key="index"
                        :data="i"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
