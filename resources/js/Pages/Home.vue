<script setup>
  import Layout from "../Layouts/Layout.vue";
  const test = 'Component';
  
defineOptions({ layout: Layout });
</script>


<template>
    <h1 class="text-success">Hello World {{test}}1</h1>
  
</template>