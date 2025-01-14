<script setup>
  import Layout from "../Layouts/Layout.vue";

  defineProps({
    name:String
  })
  const test = 'Component';
  
</script>


<template>
  <Layout>
    <h1 class="text-success">Hello World {{name}}</h1>
  </Layout>
  
</template>