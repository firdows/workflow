<script setup>
import { router, useForm } from "@inertiajs/vue3";
import { reactive } from "vue";
import TextInput from "../../Components/TextInput.vue";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    avatar: null,
    preview: null,
});

const change = (e) => {
    // console.log(e.target.files[0]);
    form.avatar = e.target.files[0];
    form.preview = URL.createObjectURL(e.target.files[0]);
};

const submit = () => {
    // console.log(form);
    form.post("/register", {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            // console.log(form.errors);
            form.reset("password", "password_confirmation");
        },
    });
};
</script>



<template lang="">
    <h1 class="title mb-6 text-2xl">Register</h1>

        <div class="w-2/4">
            <form @submit.prevent="submit">

                <div class="grid place-items-center">
                    <div class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-400">                        
                        <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
                            <span class="bg-white/90 pb-2 text-center">Avatar</span>
                        </label>
                        <!-- <input type="file" id="avatar"  @input="form.avatar = $event.target.files[0]"/> -->
                        <input type="file" id="avatar"  @input="change" hidden/>
                        <img :src="form.preview??'storage/default.png'" class="object-cover w-28 h-28"/>                        
                    </div>
                    <small class="text-red-700" v-if="form.errors.avatar">{{form.errors.avatar}}</small>
                </div>

                <TextInput title="Username" name="name" v-model="form.name" :message="form.errors.name" />

                <TextInput title="E-mail" name="email" v-model="form.email" :message="form.errors.email" />

                <TextInput title="Password" name="password" type="password" v-model="form.password" :message="form.errors.password" />

                <TextInput title="Confirm Password" name="password_confirmation" type="password" v-model="form.password_confirmation" :message="form.errors.password_confirmation" />               
                
                <div>
                    <p class="text-slate-600 mb-2">Already a user? <a href="#" class="text-link">Login</a></p>
                    <button type="submit" class="bg-slate-900 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 focus:ring-offset-slate-50 text-white font-semibold h-8 px-4 rounded-lg w-full flex items-center justify-center sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400"    :disabled="(form.processing) && (form.name == null || form.email == null)">Register</button>
                </div>
                
            </form>
        </div>
</template>
