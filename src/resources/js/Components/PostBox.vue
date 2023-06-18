<script setup>
import { useForm, usePage } from "@inertiajs/vue3";

const form = useForm({
    content: "",
});

const submitPost = (event) => {
    event.preventDefault();
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
                        @change=""
                        name="posthere"
                        placeholder="What are you thinking?"
                        v-model="form.content"
                        rows="5"
                        class="w-full rounded-md border-2 border-slate-100"
                    ></textarea>
                    <div class="flex flex-row justify-end">
                        <button
                            @click="submitPost"
                            class="py-3 px-6 rounded-md bg-slate-300 text-slate-600 font-bold"
                        >
                            Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
