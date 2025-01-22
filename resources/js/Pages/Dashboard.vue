<template lang="">
    <div class="">
        <p class="p-4 bg-green-200 rounded-md" v-if="$page.props.flash.greet">
            {{$page.props.flash.greet}}
        </p>

        {{$page.props.auth.user.name}}
    </div>
</template>
<script>
export default {};
</script>
<style lang="">
</style>
