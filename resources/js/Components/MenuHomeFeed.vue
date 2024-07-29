<template>
    <div class="w-full lg:w-1/4 my-8 mx-2 lg:mb-0">
        <div class="grid grid-cols-3 gap-4 bg-slate-900 p-4 rounded-lg">
            <template v-for="(menuItem, index) in menuItems" :key="index">
                <button
                    @click="toggleMenu(menuItem.key)"
                    :class="{
                        'text-gray-200 dark:text-gray-300 bg-gray-700 dark:bg-gray-900 rounded-full':
                            menuOpen === menuItem.key,
                        'text-gray-500 dark:text-gray-400 bg-transparent rounded-full':
                            menuOpen !== menuItem.key,
                    }"
                    class="flex flex-col items-center justify-center text-lg font-bold py-3 px-3 rounded-full focus:outline-none transition duration-150 ease-in-out !text-left"
                    style="height: 100px; width: 100px"
                >
                    <div class="flex items-center justify-center mb-2">
                        {{ menuItem.icon }}
                    </div>
                    <span class="w-full text-center">{{ menuItem.label }}</span>
                </button>
            </template>
        </div>

        <div class="mt-4">
            <template v-if="menuOpen">
                <div
                    class="bg-gray-900 dark:bg-gray-700 rounded-lg shadow-md !text-left"
                >
                    <template v-if="menuOpen === 'create'">
                        <div class="text-gray-200 dark:text-gray-300">
                            <div class="bg-gray-800">
                                <PostBox />
                            </div>
                        </div>
                    </template>
                    <template v-else-if="menuOpen === 'profile'">
                        <div class="p-3 py-3">
                            <Link
                                class="bg-slate-600 text-white rounded-md p-2"
                                :href="
                                    route(
                                        'profile.view',
                                        usePage().props.auth.user.id
                                    )
                                "
                                >{{ usePage().props.auth.user.name }}</Link
                            >
                        </div>
                    </template>
                    <template v-else-if="menuOpen === 'explore'">
                        <Search />
                    </template>
                    <template v-else-if="menuOpen === 'activity'">
                        <div class="p-3 py-3 text-white">
                            Activity Log
                        </div>

                        <div class="p-3 py-3" v-for="option in ['post','Like & Comments','Follow']">
                            <Link
                                class="bg-slate-600 text-white rounded-md p-2 w-full"
                                :href="'#'"
                                >{{ option }}</Link
                            >
                        </div>
                    </template>
                    <template v-else>
                        <p class="text-gray-200 dark:text-gray-300">
                            {{ getMenuContent(menuOpen) }}
                        </p>
                    </template>
                </div>
            </template>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import PostBox from './PostBox.vue';
import Search from './Search.vue';
import { useForm, usePage, Link } from '@inertiajs/vue3';

const menuOpen = ref(null);

const menuItems = [
    { key: 'profile', label: 'Profile', icon: '👤' },
    { key: 'create', label: 'Create', icon: '🖊️' },
    { key: 'activity', label: 'Log', icon: '📊' },
    { key: 'bots', label: 'Bots', icon: '🤖' },
    { key: 'groups', label: 'Groups', icon: '🤝' },
    { key: 'explore', label: 'Search', icon: '🔍' },
];

const toggleMenu = (menu) => {
    menuOpen.value = menuOpen.value === menu ? null : menu;
};

const getMenuContent = (menuKey) => {
    switch (menuKey) {
        case 'groups':
            return 'Groups content here...';
        case 'profile':
            return 'Profile content here...';
        case 'explore':
            return 'Explore content here...';
        case 'activity':
            return 'Activity content here...';
        case 'accountSettings':
            return 'Account Settings content here...';
        default:
            return '';
    }
};
</script>

<style scoped>
button {
    max-height: 100px;
    max-width: 100px;
}

button .flex {
    height: 60px;
}

button span {
    display: block;
    text-align: center;
}
</style>
