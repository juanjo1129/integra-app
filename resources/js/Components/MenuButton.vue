<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    type: {
        type: String,
        default: "submit",
    },
    href: {
        type: String,
        default: "#",
    },
});
</script>

<template>
    <Link
        :href="href"
        class="inline-flex items-center justify-center px-4 py-2 bg-gray-100 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-200 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
    >
        <slot />
    </Link>
</template>
