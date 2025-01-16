<script setup>
import Layout from "../Layouts/Layout.vue";
import { Head } from "@inertiajs/vue3";
const test = "Component";

// defineOptions({ layout: Layout });
</script>

<template>
  <Head :title="`${$page.component}`"></Head>  
  <h1 class="text-success">Shared Data</h1>
  <p>{{ $page.component }}</p>
  <p >{{ $page }}</p>
</template>