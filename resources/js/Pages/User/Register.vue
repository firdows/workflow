<script setup>
import { router, useForm } from '@inertiajs/vue3';
import { reactive } from 'vue';


const form = reactive({
    name:null,
    email:null,
    password:null,
    password_confirmation:null,
});

const submit = () => {
    // console.log(form);
    // router
    // router.post('/register',form)
    router.post(route('save_register'),form, {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            console.log(form.errors);
            console.log(errors);
            form.reset('password', 'password_confirmation')
        },
    });
}


</script>



<template lang="">
    <h1 class="title mb-4">Register</h1>

        <div class="w-2/4">
            <form @submit.prevent="submit">

                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Username</label>
                    <input class="shadow  border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="name" id="name" v-model="form.name">
                    <small class="text-red-700" v-if="errors.name">{{ errors.name }}</small>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input class="shadow  border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Email" id="email" v-model="form.email">
                    <small class="text-red-700" v-if="errors.email">{{ errors.email }}</small>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <input class="shadow  border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" placeholder="Password" id="password" v-model="form.password">
                    <small class="text-red-700" v-if="form.errors.password">{{ form.errors.password }}</small>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="PasswordConfirm">Confirm Password</label>
                    <input class="shadow  border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" placeholder="Confirm Password" id="PasswordConfirm" v-model="form.password_confirmation">
                </div>
                <div>
                    <p class="text-slate-600 mb-2">Already a user? <a href="#" class="text-link">Login</a></p>
                    <button type="submit" class="bg-slate-900 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 focus:ring-offset-slate-50 text-white font-semibold h-12 px-6 rounded-lg w-full flex items-center justify-center sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400"    :disabled="(form.processing || !results?.isValid) && (form.name == null &&     form.email == null)">Register</button>
                </div>
                
            </form>
        </div>
</template>
