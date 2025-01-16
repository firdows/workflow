<script setup>
import Demo from "../Layouts/Demo.vue";
import { Head } from "@inertiajs/vue3";
// const name = ref()
defineProps({
  name: String,
});

// console.log(name);
// if (name != null) {
//     defineOptions({ layout: Demo });
// }

const test = "Component";
</script>

<template>
  <Head :title="'Test '+name"></Head>
  <h1 class="text-success">Hello World {{ name }}</h1>
</template>
