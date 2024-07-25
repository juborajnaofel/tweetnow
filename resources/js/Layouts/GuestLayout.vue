<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-darktech-dark">
        <div>
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 fill-current text-darktech-primary" />
            </Link>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-darktech-light shadow-md dark:bg-darktech-dark sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>

<style scoped>
.bg-darktech-dark {
    background-color: #36393f;
    color: #ffffff;
}

.bg-darktech-light {
    background-color: #ffffff;
}

.text-darktech-primary {
    color: #7289da;
}
</style>
