<script setup>
import Layout from "../Layouts/Layout.vue";

defineProps({
  name: String,
});

defineOptions({ layout: Layout });
const test = "Component";
</script>

<template>
  <h1 class="text-success">Hello World {{ name }}</h1>
</template>
