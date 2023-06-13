<script setup>
const props = defineProps({
    data: Object,
});
</script>

<template>
    <div class="max-w-full my-4 mx-auto sm:px-6 lg:px-8">
        <div
            class="bg-slate-100 border-2 border-slate-200 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
            <div class="p-5 text-gray-900 dark:text-gray-100">
                <h1>Name {{ data }} Sample</h1>
                <br />
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Voluptates blanditiis dignissimos magnam adipisci amet ut
                incidunt, corrupti, ad ipsam esse saepe deserunt ex minima eum
                id dolore dolores reprehenderit neque.
            </div>
        </div>
    </div>
</template>
