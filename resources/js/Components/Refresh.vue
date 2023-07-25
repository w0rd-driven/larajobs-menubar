<script setup>
import { ArrowPathIcon } from "@heroicons/vue/20/solid";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <Link
        :href="route('jobs.refresh')"
        class="h-6 w-6"
    >
        <ArrowPathIcon />
    </Link>
</template>
