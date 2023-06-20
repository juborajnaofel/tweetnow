<script setup>
import PostBox from "@/Components/PostBox.vue";
import PostCard from "@/Components/PostCard.vue";
import UserCard from "@/Components/UserCard.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import axios from "axios";
const posts = ref([]);
const users = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get(
            route("post.fetch", {
                _query: {
                    limit: 3,
                    step: 1,
                },
            })
        );

        posts.value = response.data;
    } catch (error) {
        console.error(error);
    }
});

onMounted(async () => {
    try {
        const response = await axios.get(
            route("home.users.fetch", {
                _query: {
                    limit: 3,
                    step: 1,
                },
            })
        );

        users.value = response.data;
    } catch (error) {
        console.error(error);
    }
});
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

        <div
            class="py-12 flex flex-row justify-center px-5 md:px-0 overflow-y-auto"
        >
            <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">You're logged in!</div>
                </div>
            </div> -->
            <div class="flex flex-col lg:flex-row w-full px-5 justify-center">
                <div class="w-full lg:w-1/6">
                    <div class="mb-3">
                        <div class="mx-2 font-bold text-md mb-1">
                            You may know
                        </div>
                        <UserCard
                            v-for="(user, index) in users"
                            :key="index"
                            :name="user.name"
                        />
                    </div>
                </div>
                <div class="w-full lg:w-3/6">
                    <PostBox />
                    <br />
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
