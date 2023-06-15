<template>
    <div class="max-w-full mb-4 mx-auto px-2">
        <div
            class="bg-slate-100 border-2 border-slate-200 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
            <div class="p-5 text-gray-900 dark:text-gray-100">
                <span class="font-bold">Sample Name</span>
                <span class="text-xs p-2" v-if="true">✔</span><br>
                <div class="flex flex-row flex-wrap gap-3 pt-3">
                    <button class="text-xs py-1 px-6 rounded-md bg-slate-300 text-slate-600 font-bold">Follow</button>
                    <button class="text-xs py-1 px-6 rounded-md bg-slate-300 text-slate-600 font-bold">Don't Show</button>
                </div>
            </div>
        </div>
    </div>
</template>