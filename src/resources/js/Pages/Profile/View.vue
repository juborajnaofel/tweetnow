<script setup>
import PostBox from "@/Components/PostBox.vue";
import PostCard from "@/Components/PostCard.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, usePage } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import axios from "axios";
import SideCard from "@/Components/SideCard.vue";
import UserFollowButton from "@/Components/UserFollowButton.vue";

const props = defineProps({
    user: Object
});



const posts = ref([]);
const users = ref([]);
const authUser = ref(usePage().props.auth.user)
const followersCount = ref(props.user.followers_count);

onMounted(async () => {
    try {
        const response = await axios.get(
            route("post.fetch", {
                _query: {
                    limit: 20,
                    step: 1,
                    id: props.user.id
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
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex flex-row justify-between"
            >
                <span class="">{{ user.name }}</span>
                <UserFollowButton
                    v-if="user.id !== authUser.id"
                    @unfollow-event="followersCount = followersCount - 1"
                    @follow-event="followersCount = followersCount + 1"
                    :isFollowed="user.followers.find(follower=> follower.id == authUser.id)"
                    :followedId="user.id"
                />
            </div>
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
                            About
                        </div>
                        <SideCard >
                            <div class="flex flex-row flex-start gap-x-6 font-bold text-sm justify-center">
                                <span>
                                Followers: {{ followersCount }}  
                                </span>
                                <span>
                                    Following: {{ user.following_count}} 
                                </span> 
                            </div>
                            <hr>
                            <div class="flex flex-col flex-start gap-x-6 font-bold text-sm justify-center">
                                <span>
                                Bio 
                                </span>
                                <span class="font-thin">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias, dolorem doloremque error voluptate quod velit dolores, a, cupiditate tenetur quae incidunt delectus eligendi saepe libero dignissimos corporis veritatis iste nihil!
                                </span> 
                            </div>
                            <hr>
                            <div class="flex flex-col flex-start gap-x-6 font-bold text-sm justify-center">
                                <span>
                                Links
                                </span>
                                
                                    <span 
                                        class="font-thin bg-slate-100 border-1 border-slate-300"
                                        v-for="item in [
                                            {link:'/',user_name: 'tiger_l123', type:'fb'},
                                            {link:'/',user_name: 'tiger_l123', type:'in'},
                                            {link:'/',user_name: 'tiger_l123', type:'github'},
                                        ]"
                                    >
                                        <a :href="link">
                                            {{ item.type+"//: "+item.user_name }}
                                        </a>                                        
                                    </span>

                            </div>        
                        </SideCard>
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
