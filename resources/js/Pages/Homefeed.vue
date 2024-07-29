<script setup>
import PostCard from '@/Components/PostCard.vue';
import StoryCard from '@/Components/StoryCard.vue';
import MenuHomeFeed from '@/Components/MenuHomeFeed.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';

const posts = ref([]);
const users = ref([]);
const stories = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get(
            route('post.fetch', {
                _query: {
                    limit: 100,
                    step: 0,
                },
            })
        );

        posts.value = response.data;
    } catch (error) {
        console.error(error);
    }


    try {
        const response = await axios.get(
            route('post.fetch', {
                _query: {
                    limit: 20,
                    step: 0,
                    type: 'story'
                },
            })
        );

        stories.value = response.data;
    } catch (error) {
        console.error(error);
    }
});

onMounted(async () => {
    try {
        const response = await axios.get(
            route('home.users.fetch', {
                _query: {
                    limit: 10,
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
            <div class="relative">
                <div
                    class="flex flex-row justify-start gap-2 overflow-x-hidden"
                >
                    <div v-for="story in stories" :key="story">
                        <StoryCard
                                :user="story.user"
                                :post="story"
                                :config="{
                                    size: 'sm',
                                }"
                            />
                    </div>
                </div>
                <div class="absolute top-[100px] right-[-10px] sp-2 rounded-full bg-slate-800 h-10 w-10 flex flex-row justify-center items-center p-3">
                    <svg
                        width="2rem"
                        height="2rem"
                        viewBox="0 0 15 15"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path d="M12 7.5L4 0V15L12 7.5Z" fill="#fff" />
                    </svg>
                </div>
            </div>
        </template>
        <div
            class="bg-gray-800 mt-[330px] flex flex-col lg:flex-row justify-center max-w-7xl mx-auto py-6"
        >
            <MenuHomeFeed />
            <div class="w-full lg:w-1/2">
                <div class="mt-8 space-y-6">
                    <PostCard
                        v-for="(post, index) in posts"
                        :key="index"
                        :data="post"
                        class="bg-gray-800 rounded-lg"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
