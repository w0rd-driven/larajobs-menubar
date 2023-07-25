<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import JobList from "@/Components/Jobs/JobList.vue";
import { ArrowPathRoundedSquareIcon } from "@heroicons/vue/20/solid";
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
            <a href="https://larajobs.com" class="">
                <span class="sr-only">LaraJobs</span>
                <img src="/images/larajobs.svg" class="w-24" />
            </a>
        </template>

        <div class="pt-6 bg-white dark:bg-gray-800">
            <div class="max-w-full mx-auto">
                <div class="overflow-y-scroll shadow-xl">
                    <JobList :jobs="jobs" listType="All" />
                    <div v-if="!jobs.length" class="text-xl text-center mx-48">
                        <p class="font-bold text-3xl my-8">There are no jobs listed.</p>
                        <p>
                            If this is your first time opening the application,
                        </p>
                        <p>
                            please click the refresh icon
                            <ArrowPathRoundedSquareIcon
                                class="inline-block h-6 w-6"
                            />
                            in the top right.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
