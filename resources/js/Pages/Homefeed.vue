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

onMounted(async () => {
    try {
        const response = await axios.get(
            route('post.fetch', {
                _query: {
                    limit: 100,
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

const reels = [
    {
        content: 'https://example.com/reel-video1.mp4',
        type: 'video',
        timestamp: '2024-07-16T12:00:00Z',
    },
    {
        content: 'https://example.com/reel-video2.mp4',
        type: 'video',
        timestamp: '2024-07-16T13:30:00Z',
    },
    {
        content: 'https://example.com/reel-image1.jpg',
        type: 'image',
        timestamp: '2024-07-16T15:00:00Z',
    },
    {
        content: 'https://example.com/reel-video3.mp4',
        type: 'video',
        timestamp: '2024-07-16T16:45:00Z',
    },
    {
        content: 'https://example.com/reel-image2.jpg',
        type: 'image',
        timestamp: '2024-07-16T18:15:00Z',
    },
    {
        content: 'https://example.com/reel-video4.mp4',
        type: 'video',
        timestamp: '2024-07-16T20:00:00Z',
    },
    {
        content: 'https://example.com/reel-image3.jpg',
        type: 'image',
        timestamp: '2024-07-17T09:30:00Z',
    },
    {
        content: 'https://example.com/reel-video5.mp4',
        type: 'video',
        timestamp: '2024-07-17T12:00:00Z',
    },
    {
        content: 'https://example.com/reel-image4.jpg',
        type: 'image',
        timestamp: '2024-07-17T14:20:00Z',
    },
    {
        content: 'https://example.com/reel-video6.mp4',
        type: 'video',
        timestamp: '2024-07-17T16:15:00Z',
    },
    {
        content: 'https://example.com/reel-image5.jpg',
        type: 'image',
        timestamp: '2024-07-17T18:45:00Z',
    },
    {
        content: 'https://example.com/reel-video7.mp4',
        type: 'video',
        timestamp: '2024-07-18T10:00:00Z',
    },
    {
        content: 'https://example.com/reel-image6.jpg',
        type: 'image',
        timestamp: '2024-07-18T12:30:00Z',
    },
    {
        content: 'https://example.com/reel-video8.mp4',
        type: 'video',
        timestamp: '2024-07-18T15:00:00Z',
    },
    {
        content: 'https://example.com/reel-image7.jpg',
        type: 'image',
        timestamp: '2024-07-18T17:45:00Z',
    },
    {
        content: 'https://example.com/reel-video9.mp4',
        type: 'video',
        timestamp: '2024-07-18T20:00:00Z',
    },
    {
        content: 'https://example.com/reel-image8.jpg',
        type: 'image',
        timestamp: '2024-07-19T09:30:00Z',
    },
    {
        content: 'https://example.com/reel-video10.mp4',
        type: 'video',
        timestamp: '2024-07-19T12:00:00Z',
    },
    {
        content: 'https://example.com/reel-image9.jpg',
        type: 'image',
        timestamp: '2024-07-19T14:20:00Z',
    },
    {
        content: 'https://example.com/reel-video11.mp4',
        type: 'video',
        timestamp: '2024-07-19T16:15:00Z',
    },
    {
        content: 'https://example.com/reel-image10.jpg',
        type: 'image',
        timestamp: '2024-07-19T18:45:00Z',
    },
];

const user = {
    username: 'john_doe',
    profilePicture: 'https://example.com/profile-picture.jpg',
};
</script>

<template>
    <Head title="Feed" />

    <AuthenticatedLayout>
        <template #header>
            <div class="relative">
                <div
                    class="flex flex-row justify-start gap-2 overflow-x-hidden"
                >
                    <div v-for="reel in reels" :key="reel">
                        <StoryCard :reel="reel" :user="user" />
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
