<script setup>
import { router, useForm } from '@inertiajs/vue3';
import { reactive } from 'vue';
import TextInput from '../../Components/TextInput.vue';

const form = useForm({
    name:null,
    email:null,
    password:null,
    password_confirmation:null,
});

const submit = () => {
    // console.log(form);
    form.post('/auth/register', {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            // console.log(form.errors);
            form.reset('password', 'password_confirmation')
        },
    });
}

</script>



<template lang="">
    <h1 class="title mb-4">Register</h1>

        <div class="w-2/4">
            <form @submit.prevent="submit">

                <TextInput title="Username" name="name" v-model="form.name" :message="form.errors.name" />

                <TextInput title="E-mail" name="email" v-model="form.email" :message="form.errors.email" />

                <TextInput title="Password" name="password" type="password" v-model="form.password" :message="form.errors.password" />

                <TextInput title="Confirm Password" name="password_confirmation" type="password" v-model="form.password_confirmation" :message="form.errors.password_confirmation" />               
                
                <div>
                    <p class="text-slate-600 mb-2">Already a user? <a href="#" class="text-link">Login</a></p>
                    <button type="submit" class="bg-slate-900 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 focus:ring-offset-slate-50 text-white font-semibold h-12 px-6 rounded-lg w-full flex items-center justify-center sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400"    :disabled="(form.processing) && (form.name == null || form.email == null)">Register</button>
                </div>
                
            </form>
        </div>
</template>
