<script setup>
import PostBox from '@/Components/PostBox.vue';
import PostCard from '@/Components/PostCard.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';
import SideCard from '@/Components/SideCard.vue';
const props = defineProps({
    user: Object,
});

const posts = ref([]);
const users = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get(
            route('post.fetch', {
                _query: {
                    limit: 20,
                    step: 1,
                    id: props.user.id,
                },
            })
        );

        posts.value = response.data;
    } catch (error) {
        console.error(error);
    }
});
</script>

<template>
    <Head title="Feed" />
    <AuthenticatedLayout>
        <template #header>
            <div
                class="font-semibold text-xl text-gray-100 leading-tight flex flex-row justify-between bg-gray-900 p-4"
            >
                <span>{{ user.name }}</span>
            </div>
        </template>
        <div
            class="flex flex-col lg:flex-row justify-center max-w-7xl mx-auto py-6"
        >
            <!-- Sidebar Section -->
            <div class="w-full lg:w-1/3 p-4 lg:p-6">
                <div class="mb-6">
                    <div class="font-bold text-md mb-2 text-gray-300">About</div>
                    <SideCard class="bg-gray-800 text-gray-100">
                        <div class="flex flex-col gap-y-2 text-sm">
                            <div class="flex items-center justify-between">
                                <span class="font-semibold">Followers:</span>
                                <span>{{ user.followers_count }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="font-semibold">Following:</span>
                                <span>{{ user.following_count }}</span>
                            </div>
                            <hr class="my-2 border-gray-700" />
                            <div class="flex flex-col gap-y-2">
                                <span class="font-semibold">Bio</span>
                                <span class="text-gray-400">
                                {{user.bio}}
                                </span>
                            </div>
                            <hr class="my-2 border-gray-700" />
                            <div class="flex flex-col gap-y-2">
                                <span class="font-semibold">Links</span>
                                <div
                                    v-for="item in user.social_links"
                                    :key="item.type"
                                    class="text-gray-400"
                                >
                                    <a :href="item.link" class="bg-gray-700 border border-gray-600 rounded-md px-2 py-1 block hover:bg-gray-600">
                                        {{ item.type + ': ' + item.url }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </SideCard>
                </div>
            </div>

            <!-- Posts Section -->
            <div class="w-full lg:w-2/3 p-4 lg:p-6 mt-10">
                <PostBox />
                <div class="space-y-6">
                    <PostCard
                        v-for="(post, index) in posts"
                        :key="index"
                        :data="post"
                        class="bg-gray-800 rounded-lg p-4"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

