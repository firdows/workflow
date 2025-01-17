<script setup>
const model = defineModel({
    type: null,
    required:true
})

defineProps({
    name: {
        type: String,
        required:true,
    },
    type: {
        type: String,
        default:'text' 
    },
    title: String,
    message: String,
     className: {
        type: String,
        default:'mb-4' 
    },
})
</script>
<template>
    <div :class="className">
        <label class="block text-gray-700 text-sm font-bold mb-2" :for="'input'+name">{{ title?title:name }}</label>
        <input class="shadow  border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" :type="type" :placeholder="title?title:name" :id="'input'+name" v-model="model">
        <small class="text-red-700" v-if="message">{{ message }}</small>
    </div>
</template>