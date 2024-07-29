<script setup>
import { ref } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';

const form = useForm({
    socialLinks: []
});

const user = usePage().props.auth.user;

form.socialLinks = user.social_links;

const socialLinkTypes = ['Facebook', 'Twitter', 'Instagram', 'LinkedIn', 'GitHub'];

const addLink = () => {
    form.socialLinks.push({ type: '', url: '' });
};

const removeLink = (index) => {
    form.socialLinks.splice(index, 1);
};

const submitForm = () => {
    form.post(route('social-links.update'), {
        onSuccess: () => {
            alert('Social links updated successfully!');
        },
        onError: () => {
            alert('Failed to update social links.');
        }
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Social Media Links</h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Manage your social media links and update them.
            </p>
        </header>

        <form @submit.prevent="submitForm" class="mt-6 space-y-6">
            <div v-for="(link, index) in form.socialLinks" :key="index" class="flex items-center gap-4 mb-4">
                <select
                    v-model="link.type"
                    class="block w-1/3 bg-gray-800 text-gray-100 border-gray-600 rounded-md"
                >
                    <option value="">Select Type</option>
                    <option v-for="type in socialLinkTypes" :key="type" :value="type">
                        {{ type }}
                    </option>
                </select>

                <input
                    v-model="link.url"
                    type="url"
                    placeholder="https://example.com"
                    class="block w-2/3 mt-1 px-3 py-2 bg-gray-800 text-gray-100 border-gray-600 rounded-md"
                />

                <button
                    type="button"
                    @click="removeLink(index)"
                    class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-200"
                >
                    Remove
                </button>
            </div>

            <button
                type="button"
                @click="addLink"
                class="text-blue-500 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300"
            >
                Add New Link
            </button>

            <div class="flex items-center gap-4 mt-4">
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-600"
                >
                    Save
                </button>
            </div>
        </form>
    </section>
</template>
