<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Navbar from "./Navbar.vue";
</script>

<template>
  <Head>
    <title>Layout</title>
    <link rel="icon" href="/favicon.ico" />
  </Head>
  <div>
    <header class="bg-green-500 text-white">
      <Navbar />

      <!-- <nav
        class="flex items-center justify-between p-4 max-w-screen-lg mx-auto"
      >
        <div class="space-x-6">
          <Link href="/">Home</Link>
          <Link href="/about">About</Link>
          <Link href="/test">Test</Link>
          <Link href="/test?name=Ahamad">Test(param)</Link>
          <Link href="/progress">Progress</Link>
          <Link href="/shared-data">Shared Data</Link>
        </div>
      </nav> -->
    </header>

    <main class="p-4 pt-8 max-w-screen-lg mx-auto">
      <slot></slot>
    </main>
  </div>
</template>
