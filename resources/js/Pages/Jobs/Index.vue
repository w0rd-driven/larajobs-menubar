<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import JobList from '@/Components/Jobs/JobList.vue';
const props = defineProps({
    jobs: {
        type: Array,
        default: [],
    },
});
</script>

<template>
    <AppLayout title="Jobs">
        <template #header>
            <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
                Jobs
            </h2>
        </template>

        <div class="">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <JobList :jobs="jobs" listType="All" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
