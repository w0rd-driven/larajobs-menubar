<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import JobList from "@/Components/Jobs/JobList.vue";
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
            <a
                href="https://larajobs.com"
                class=""
            >
                <span class="sr-only">LaraJobs</span>
                <img src="https://larajobs.com/img/logo.svg" class="w-24" />
            </a>
        </template>

        <div class="pt-6 bg-white dark:bg-gray-800">
            <div class="max-w-full mx-auto">
                <div
                    class="overflow-y-scroll shadow-xl"
                >
                    <JobList :jobs="jobs" listType="All" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
