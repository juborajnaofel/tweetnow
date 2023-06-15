<script setup>
import PostBox from "@/Components/PostBox.vue";
import PostCard from "@/Components/PostCard.vue";
import UserCard from "@/Components/UserCard.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

const posts = ref([
    {
        userInfo: {
            name: "John Doe",
            link: "",
            is_verified: true,
        },
        postInfo: {
            content: "Hello, world!",
            like_count: 10,
            comment_count: 5,
            share_count: 2,
        },
    },
    {
        userInfo: {
            name: "Jane Smith",
            link: "",
            is_verified: false,
        },
        postInfo: {
            content: "Check out this amazing recipe!",
            like_count: 15,
            comment_count: 7,
            share_count: 3,
        },
    },
    {
        userInfo: {
            name: "Michael Johnson",
            link: "",
            is_verified: true,
        },
        postInfo: {
            content: "Excited for my upcoming vacation!",
            like_count: 20,
            comment_count: 10,
            share_count: 4,
        },
    },
    {
        userInfo: {
            name: "Emily Davis",
            link: "",
            is_verified: false,
        },
        postInfo: {
            content: "Just finished reading a great book!",
            like_count: 8,
            comment_count: 3,
            share_count: 1,
        },
    },
    {
        userInfo: {
            name: "Alex Johnson",
            link: "",
            is_verified: true,
        },
        postInfo: {
            content: "Sharing my latest photography work!",
            like_count: 12,
            comment_count: 6,
            share_count: 2,
        },
    },
]);
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

        <div class="py-12 flex flex-row justify-center px-5 md:px-0 overflow-y-auto">
            <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">You're logged in!</div>
                </div>
            </div> -->
            <div class="flex flex-col lg:flex-row w-full px-5 justify-center">
                <div class="w-full lg:w-1/6">

                    <div class="mb-3">     
                        <h1 class="mx-3 font-bold text-2xl mb-3">You may know</h1>               
                        <UserCard v-for="item, index in [1,2,3]" :key="index"/>
                    </div>
                    <div class="mb-3">     
                        <h1 class="mx-3 font-bold text-2xl mb-3">You may know</h1>               
                        <UserCard v-for="item, index in [1,2,3]" :key="index"/>
                    </div>

                </div>
                <div class="w-full lg:w-3/6">                    
                    <PostBox />
                    <br>
                    <PostCard
                        v-for="(post, index) in posts"
                        :key="index"
                        :data="post"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
