<script setup>
import { Head, Link } from "@inertiajs/vue3";
</script>

<template>
    <div>
        <header class="bg-indigo-500 text-white">
            <nav
                class="flex items-center justify-between p-4 max-w-screen-lg mx-auto"
            >
                <div class="space-x-6">
                    <!-- <a href="/">Home</a> -->
                    <Link href="/">Home</Link>
                    <Link href="/about">About</Link>
                    <Link href="/test">Test</Link>
                    <Link href="/test?name=Ahamad">Test(param)</Link>
                </div>
            </nav>
        </header>
        <main class="p-4 pt-8 max-w-screen-lg mx-auto">
            <slot></slot>
        </main>
    </div>
</template>
