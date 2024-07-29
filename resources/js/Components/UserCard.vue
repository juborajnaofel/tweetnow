<script setup>
import UserFollowButton from "./UserFollowButton.vue";
import { Link, usePage } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    name: String,
    id: Number,
    followers: Array,
});

const followersCount = ref(props.followers?.length);
const authUser = usePage().props.auth.user;
</script>

<template>
    <div class="max-w-full mb-4">
        <div class="bg-gray-900 dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <div class="p-4">
                <Link :href="route('profile.view', id)">
                    <div class="font-bold text-xl text-gray-200 dark:text-gray-300">{{ name }}</div>
                </Link>
                <hr class="my-2 border-gray-700 dark:border-gray-600">

                <div class="flex items-center justify-between">
                    <UserFollowButton
                        @unfollow-event="followersCount -= 1"
                        @follow-event="followersCount += 1"
                        :isFollowed="followers.some(follower => follower.id === authUser.id)"
                        :followedId="id"
                    />

                    <div class="text-sm text-gray-400 dark:text-gray-500">
                        Followers: {{ followersCount }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
