<script setup>
defineProps({
  name: {
    type: String,
    required: true,
  },
  title: {
    type: String,
  },
  direction: {
    type: Object,
    required: true,
  },
  column: {
    type: String,
  },
});
</script>

<template lang="">
    <th scope="col" >
        <p class="flex capitalize items-center justify-between gap-2 font-sans text-sm antialiased font-normal leading-none text-gray-900 cursor-pointer">
            {{title?title:name}}      
                   
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 h-3"
            v-if="name == column && direction == 'asc'">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
            </svg>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3"
            v-else>
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18" />
            </svg>
        </p>
    </th>
</template>

