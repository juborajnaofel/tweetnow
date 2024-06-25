<script setup>
import TNowButton from "@/Components/TNButton.vue";
import { Link, usePage } from "@inertiajs/vue3";
import moment from "moment";
import UserFollowButton from "./UserFollowButton.vue";
import { ref } from "vue";



const props = defineProps({
    name: String,
    id: Number,
    followers: Object
});
const followersCount = ref(props.followers?.length);

const authUser = ref(usePage().props.auth.user)

</script>

<template>
    <div class="max-w-full mb-2 mx-auto">
        <div
            class="bg-slate-100 border-2 border-slate-200 dark:bg-gray-800 overflow-hidden shadow-sm rounded-2xl"
        >
            <div class="py-1 text-gray-900 dark:text-gray-100">
                
                <Link :href="route('profile.view', id)">
                    <div class="font-bold text-sm px-2">{{ name }}</div>
                </Link>
                <hr>
                {{  }}
                <div class="flex flex-row flex-wrap gap-1 px-1 mt-1">
                     <UserFollowButton
                       @unfollow-event="followersCount = followersCount - 1"
                       @follow-event="followersCount = followersCount + 1"
                      :isFollowed="followers.find(follower=> follower.id == authUser.id)"
                      :followedId="id"
                     />
                    <div class="text-xs py-1">
                        Followed by {{ followersCount }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
