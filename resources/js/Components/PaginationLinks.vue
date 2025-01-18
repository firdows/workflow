<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    paginator: {
        type: Object,
        required: true,
    },
});
const makeLabel = (label) => {
    if (label.includes("Previous")) {
        return "<<";
    } else if (label.includes("Next")) {
        return ">>";
    } else {
        return label;
    }
};
</script>


<template>
    <div class="flex justify-between items-start">
        <!-- Pagination -->
        <div class="flex item-center rounded-md orerflow-hidden shadow">
            <div v-for="link in paginator.links" :key="link.url">
                <component
                    :is="link.url ? Link : 'span'"
                    :key="link.label"
                    :href="link.url"
                    v-html="makeLabel(link.label)"
                    class="border-x border-slate-50 w-12 h-10 grid place-items-center bg-white"
                    :class="{
                        'hover:bg-slate-300': link.url,
                        'text-zinc-400': !link.url,
                        'font-bold text-blue-500 bg-slate-100': link.active,
                    }"
                />
            </div>
        </div>

        <!-- Summary -->
        <p class="text-skate-600 text-sm mt-2">
            Showing {{ paginator.from }} to {{ paginator.to }} of
            {{ paginator.total }} results
        </p>
    </div>
</template>
