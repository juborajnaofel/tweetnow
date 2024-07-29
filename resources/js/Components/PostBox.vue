<script setup>
import StoryCard from '@/Components/StoryCard.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = useForm({
    content: '',
    background_color: '#ffffff',
    text_color: '#000000',
    type: 'post',
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
    form.type = selectedTab.value == 'tab2' ? 'story' : 'post';
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

const user = {
    username: 'john_doe',
    profilePicture: 'https://example.com/profile-picture.jpg',
};

const isMaximized = ref(false);
</script>

<template>
    <div
        class="w-full mx-auto"
        :class="isMaximized ? 'fixed top-0 left-0 w-full h-full' : ''"
    >
        <!-- Header with maximize/minimize button -->
        <div class="bg-gray-900 rounded-lg shadow-md overflow-hidden">
            <div
                class="flex flex-row justify-between bg-slate-800 m-1 rounded-lg mb-3"
            >
                <div class="flex flex-row justify-start">
                    <input
                        type="radio"
                        id="tab1"
                        name="tabs"
                        v-model="selectedTab"
                        value="tab1"
                        class="hidden"
                    />
                    <label
                        for="tab1"
                        class="border border-gray-600 py-2 px-4 bg-gray-800 cursor-pointer text-gray-300 hover:bg-gray-700"
                        :class="selectedTab == 'tab1' ? 'bg-gray-600' : ''"
                    >
                        Post
                    </label>

                    <input
                        type="radio"
                        id="tab2"
                        name="tabs"
                        v-model="selectedTab"
                        value="tab2"
                        class="hidden"
                    />
                    <label
                        for="tab2"
                        class="border border-gray-600 py-2 px-4 bg-gray-800 cursor-pointer text-gray-300 hover:bg-gray-700"
                        :class="selectedTab == 'tab2' ? 'bg-gray-600' : ''"
                    >
                        Story
                    </label>
                </div>
                <button class="p-1 px-2 text-slate-400" @click="isMaximized = !isMaximized">
                    {{ isMaximized ? 'x' : '⧉' }}
                </button>
            </div>

            <!-- Tab content -->
            <div v-if="selectedTab === 'tab2'" class="p-2">
                <!-- Settings for background and text color -->
                <div class="flex flex-col space-y-2">
                    <div class="flex flex-row justify-start">
                        <div class="w-1/2">Background Color</div>
                        <input
                            type="color"
                            v-model="form.background_color"
                            class="w-1/2 text-sm rounded-md bg-gray-800 focus:outline-none placeholder-gray-500"
                        />
                    </div>

                    <div class="flex flex-row justify-start">
                        <div class="w-1/2">Text Color</div>
                        <input
                            type="color"
                            v-model="form.text_color"
                            class="w-1/2 text-sm rounded-md bg-gray-800 focus:outline-none placeholder-gray-500"
                        />
                    </div>

                    <div
                        class="flex flex-row justify-start p-1 border border-grey rounded-lg"
                    >
                        <div
                            :style="`background-color: ${form.background_color}; color:${form.text_color}`"
                            :class="`relative w-full p-4  rounded-lg shadow-md h-48`"
                        >
                            <div class="whitespace-pre-wrap p-5">
                                {{ form.content }}
                            </div>
                            <span
                                class="absolute top-0 left-0 p-2 text-white bg-slate-700 opacity-75 w-full z-10"
                                >Story Preview</span
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- Post textarea and submit button -->
            <div class="p-4 text-white">
                <form @submit="submitPost">
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
                            type="submit"
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
