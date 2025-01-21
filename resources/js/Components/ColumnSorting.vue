<script setup>
// import {useContext} from "vue";
// const { emit } = useContext();
const emit = defineEmits(["resort"]);
defineProps({
    name: {
        type: String,
        required: true,
    },
    title: {
        type: String,
    },
    direction: {
        type: String,
        // required: true,
    },
    column: {
        type: String,
    },
});

function resortColumn(name) {
    console.log(`sort-column: ${name}`);
    emit("resort", name);
    // this.$emit('resort',name);
}
</script>

<template lang="">
    <th scope="col" @click="resortColumn(name)">
        <p class="flex capitalize items-center justify-between gap-2 font-sans text-sm antialiased leading-none text-gray-900 cursor-pointer">
            {{title?title:name}}      
                   
           
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3"
            v-if="name == column && direction == 'asc'">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
            </svg>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3"
            v-else-if="name == column && direction == 'desc'">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
            </svg>
          

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3"
            v-else>
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
            </svg>

        </p>
    </th>
</template>

