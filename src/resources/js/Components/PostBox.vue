<script setup>
import { useForm, usePage } from "@inertiajs/vue3";
import { ref } from "vue";

const form = useForm({
    content: "",
});

const allowedLength = ref(200);

const isContentCharNumberNotAllowed = () => {
    return allowedLength.value < form.content.length;
};

const submitPost = (event) => {
    event.preventDefault();

    if (isContentCharNumberNotAllowed()) {
        alert(
            "Only " +
                allowedLength.value +
                " characters are allowed for your post!"
        );
        return;
    }

    form.post(route("post.store"), {
        onFinish() {
            form.content = "";
            const { toast } = usePage().props;
            alert(toast.status + ": " + toast.message);
        },
        onError() {
            alert("Error!");
        },
    });
};
</script>

<template>
    <div class="w-full mx-auto px-2">
        <div
            class="bg-slate-100 border-2 border-slate-200 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
            <div class="p-1 text-gray-900 dark:text-gray-100">
                <form class="w-full">
                    <textarea
                        name="posthere"
                        placeholder="What are you thinking?"
                        v-model="form.content"
                        rows="2"
                        class="w-full text-sm rounded-md border-2 border-slate-100"
                    ></textarea>
                    <div class="flex flex-row justify-between">
                        <div>
                            <span
                                class="font-bold text-[10px]"
                                :class="
                                    isContentCharNumberNotAllowed()
                                        ? 'text-red-400'
                                        : ''
                                "
                            >
                                <template v-if="form.content.length > 0">
                                    {{ form.content.length }}/
                                    {{
                                        allowedLength
                                    }}
                                </template>
                            </span>
                        </div>
                        <button
                            @click="submitPost"
                            class="py-1 px-4 text-sm rounded-md bg-slate-300 text-slate-600 font-bold"
                        >
                            Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
