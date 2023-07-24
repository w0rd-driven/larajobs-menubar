<script setup>
import JobItem from "@/Components/Jobs/JobItem.vue";

const props = defineProps({
    listType: {
        type: String,
        default: null,
    },
    jobs: {
        type: Array,
        default: [],
    },
});
</script>

<template>
    <div>
        <JobItem v-for="job in jobs" :listType="listType" :job="job" />
    </div>
</template>
