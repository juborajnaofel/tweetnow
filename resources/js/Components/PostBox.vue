<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = useForm({
    content: '',
});
const selectedTab = ref('tab1');

const allowedLength = ref(usePage().props.configs.post_character_limit);

const isContentCharNumberNotAllowed = () => {
    return allowedLength.value < form.content.length;
};

const submitPost = (event) => {
    event.preventDefault();

    if (isContentCharNumberNotAllowed()) {
        alert(
            'Only ' +
                allowedLength.value +
                ' characters are allowed for your post!'
        );
        return;
    }

    form.post(route('post.store'), {
        onFinish() {
            form.content = '';
            const { toast } = usePage().props;
            alert(toast.status + ': ' + toast.message);
        },
        onError() {
            alert('Error!');
        },
    });
};
</script>

<template>
    <div class="w-full mx-auto px-2">
        <div class="bg-gray-900 rounded-lg shadow-md overflow-hidden">
            <div class="flex">
                <!-- Radio inputs -->
                <input type="radio" id="tab1" name="tabs" v-model="selectedTab" value="tab1" class="hidden">
                <label for="tab1" class="border border-gray-600 py-2 px-4 bg-gray-800 cursor-pointer text-gray-300 hover:bg-gray-700">Story</label>

                <input type="radio" id="tab2" name="tabs" v-model="selectedTab" value="tab2" class="hidden">
                <label for="tab2" class="border border-gray-600 py-2 px-4 bg-gray-800 cursor-pointer text-gray-300 hover:bg-gray-700">Post</label>
            </div>
            <div class="p-4 text-white">
                <form>
                    <textarea
                        name="posthere"
                        placeholder="What are you thinking?"
                        v-model="form.content"
                        rows="2"
                        class="w-full text-sm rounded-md bg-gray-800 focus:outline-none py-2 px-3 placeholder-gray-500"
                    ></textarea>
                    <div class="flex justify-between items-center mt-2">
                        <span
                            :class="{
                                'text-red-400': isContentCharNumberNotAllowed(),
                                'text-gray-400':
                                    !isContentCharNumberNotAllowed(),
                            }"
                            class="text-xs font-semibold"
                        >
                            {{ form.content.length }} / {{ allowedLength }}
                        </span>
                        <button
                            @click="submitPost"
                            class="py-2 px-4 text-sm rounded-md bg-blue-500 text-white font-bold hover:bg-blue-600 focus:outline-none"
                        >
                            Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
