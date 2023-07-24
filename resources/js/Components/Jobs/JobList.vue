<script setup>
import JobItem from "@/Components/Jobs/JobItem.vue";

const props = defineProps({
    listType: {
        type: String,
        default: null,
    },
    jobs: {
        type: Array,
        default: [1, 2, 3, 4, 5],
    },
});

</script>

<template>
    <div>
        <JobItem v-for="job in jobs" :listType="listType" />
    </div>
</template>
