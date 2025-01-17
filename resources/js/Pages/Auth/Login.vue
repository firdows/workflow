<script setup>
import TextInput from "../../Components/TextInput.vue";
import { useForm, Link } from "@inertiajs/vue3";

const form = useForm({
  email: null,
  password: null,
  remember: null,
});
const submit = () => {
  console.log(form);
  form.post("/login", {
    onError: () => {
      form.reset("password");
    },
  });
};
</script>
    

<template>
  <h1
    class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white"
  >
    Login
  </h1>
  <div class="w-3/4">
    <form @submit.prevent="submit">
      <TextInput
        title="Email"
        name="email"
        v-model="form.email"
        :message="form.errors.email"
      />
      <TextInput
        title="Password"
        name="password"
        type="password"
        v-model="form.password"
        :message="form.errors.password"
      />

      <div class="flex item-center justify-between">
        <div class="flex text-slate-600 mb-2">
          <input type="checkbox" id="remember" v-model="form.remember" />
          <label for="remember"> Remember me</label>
        </div>

        <p class="text-slate-600">
          Need a account?
          <Link href="/register" class="text-link text-red-900 text-bold"
            >Register</Link
          >
        </p>
      </div>

      <div>
        <button
          type="submit"
          class="bg-slate-900 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-300 focus:ring-offset-2 focus:ring-offset-slate-50 text-white font-semibold h-12 px-6 rounded-lg w-full flex items-center justify-center sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400"
          :disabled="
            form.processing && (form.email == null || form.password == null)
          "
        >
          Login
        </button>
      </div>
    </form>
  </div>
</template>


