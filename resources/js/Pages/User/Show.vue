<template lang="">
    <div>
       <img :src="'/storage/'+model.avatar" alt="" class="w-20 avatar" />
    <table>
        <tr>
            <th>Username :</th><td>{{model.name}}</td>
        </tr>
    </table>    
    </div>
</template>
<script setup>
defineProps({
    model: Object,
});
</script>
<style lang="">
</style>