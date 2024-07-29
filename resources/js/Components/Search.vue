<script setup>
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3'
import axios from 'axios';

const query = ref('');
const suggestions = ref([]);
const showSuggestions = ref(false);

// Fetch suggestions based on the query
const fetchSuggestions = async (query) => {
    if (query.trim() === '') {
        suggestions.value = [];
        return;
    }

    try {
        const response = await axios.get(route('search.suggestions', { query }));
        suggestions.value = response.data;
    } catch (error) {
        console.error('Error fetching suggestions:', error);
    }
};

// Watch the query and fetch suggestions when it changes
watch(query, (newValue) => {
    if (newValue.length > 0) {
        fetchSuggestions(newValue);
    } else {
        suggestions.value = [];
    }
});

// Handle input change
const handleInputChange = (event) => {
    query.value = event.target.value;
    showSuggestions.value = true;
};

const handleSuggestionClick = (id) => {
    router.get(route('profile.view', id));
};
</script>

<template>
    <div class="relative p-3 py-3 flex flex-col lg:flex-row items-center bg-gray-800 rounded-lg shadow-md">
        <input
            type="text"
            name="search"
            v-model="query"
            @input="handleInputChange"
            placeholder="Search..."
            class="w-full lg:w-auto p-2 rounded-t-md lg:rounded-l-md border border-gray-600 bg-gray-700 text-gray-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
        />
        <button
            type="submit"
            class="w-full lg:w-auto p-2 bg-blue-500 text-white rounded-b-md lg:rounded-r-md mt-2 lg:mt-0 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
        >
            🔍
        </button>


        <div
            v-if="showSuggestions && suggestions.length > 0"
            class="absolute w-full top-[50px] mt-2 bg-gray-800 border border-gray-600 rounded-lg shadow-lg"
        >
            <ul class="list-none p-0 m-0">
                <li
                    v-for="(suggestion, index) in suggestions"
                    :key="index"
                    @click="handleSuggestionClick(suggestion.id)"
                    class="p-2 hover:bg-gray-700 cursor-pointer text-gray-200"
                >
                    {{ suggestion.name }}
                </li>
            </ul>
        </div>
    </div>
</template>
