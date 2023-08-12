<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const classes =  ref("text-xs py-1 px-3 rounded-xl bg-slate-300 text-slate-600 font-bold");
const props = defineProps({
    variant: String,
    isFollowed: Boolean,
    followedId: Number
});


const followHandler = () => {
    const form = useForm({});
    form.post(route('user.follow.user', props.followedId));
}

const unfollowHandler = () => {
    const form = useForm({});
    form.post(route('user.unfollow.user', props.followedId));
}
</script>

<template>
    <button
        v-if="!isFollowed"
        :class="classes"
        @click="followHandler"
    >
        Follow
    </button>
    <button
        v-else
        :class="classes"
        @click="unfollowHandler"
    >
        Unfollow
    </button>
</template>
