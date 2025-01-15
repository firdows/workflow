<script setup>
import Layout from "../Layouts/Layout.vue";
import { Head } from "@inertiajs/vue3";
const test = "Component";

// defineOptions({ layout: Layout });
</script>

<template>

  <Head>
    <title>Home</title>
  </Head>
  <h1 class="text-success">Hello World {{ test }}1</h1>
</template>
