<script setup>
import { Link } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {
    SunIcon,
    MoonIcon,
    ComputerDesktopIcon,
    BuildingOfficeIcon,
} from "@heroicons/vue/20/solid";

const props = defineProps({
    listType: {
        type: String,
        default: null,
    },
    job: {
        type: Object,
        default: null,
    },
});
</script>

<template>
    <a
        data-url="https://accuratebiometrics.com/"
        href="/job/3087"
        class="job-link group block mb-6 px-12"
    >
        <div
            class="relative rounded border border-gray-200 px-2 md:px-6 py-5 shadow-sm flex items-center md:space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500"
            style="min-height: 110px; background-color: "
        >
            <div
                class="flex-shrink-0 mb-2 md:mb-0 md:absolute rounded-full md:p-4 md:bg-white md:shadow-lg md:-left-9"
            >
                <img
                    src="https://larajobs.com/logos/uVd76pQhPLdeV6ULSa0vr9lsNRBl8Ulhqqo38Yy4.gif"
                    class="h-10 w-10 rounded object-contain"
                />
            </div>

            <div class="flex flex-col md:flex-row w-full">
                <div
                    class="flex-1 min-w-0 px-2 md:pl-6 mb-2 md:mb-0 w-full"
                    style="color: #2d3748"
                >
                    <span class="absolute inset-0" aria-hidden="true"></span>
                    <p
                        class="text-sm text-gray-500 truncate"
                        style="color: #2d3748"
                    >
                        Accurate Biometrics
                    </p>
                    <p
                        class="text-lg font-bold text-gray-900"
                        style="color: #2d3748"
                    >
                        FULL STACK DEVELOPER
                    </p>
                    <p
                        class="text-sm text-gray-500 truncate"
                        style="color: #2d3748"
                    >
                        Full Time
                        <span class="text-gray-500" style="color: #2d3748"
                            >- $95,000-$115,000</span
                        >
                    </p>
                </div>
                <div
                    class="flex-none md:flex flex-col md:justify-end text-sm text-gray-500 px-2"
                    style="color: #2d3748"
                >
                    <div class="flex-none md:flex sm:justify-end">
                        <div
                            class="flex items-center mr-4 mb-1 md:mb-0 text-sm text-gray-500 truncate"
                            style="color: #2d3748"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            Itasca, IL/Remote
                        </div>
                        <div class="flex items-center" style="color: #2d3748">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                ></path>
                            </svg>
                            1d
                        </div>
                    </div>
                    <div
                        class="flex flex-wrap gap-1 md:gap-2 md:justify-end mt-2"
                    >
                        <div
                            class="text-sm border text-gray-700 border-gray-400 px-1 py-0 md:px-2 rounded self-center whitespace-no-wrap"
                            style="color: #2d3748"
                        >
                            Laravel
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</template>