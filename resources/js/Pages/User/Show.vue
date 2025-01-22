<template lang="">
    <div>
       
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <tr>
            <th><img :src="'/storage/'+model.avatar" alt="" class="w-20 avatar border rounded-md" /></th>
        </tr>
        <tr>
            <th>Username :</th><td>{{model.name}}</td>
        </tr>
        <tr>
            <th>Email :</th><td>{{model.email}}</td>
        </tr>
        <tr>
            <th>Created At :</th><td>{{getDate(model.created_at)}}</td>
        </tr>
    </table>    
    </div>
</template>
<script setup>
defineProps({
    model: Object,
});
const getDate = ($date) =>
    new Date($date).toLocaleDateString("th-TH", {
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "numeric",
        minute: "numeric",
    });
</script>
<style lang="">
</style>