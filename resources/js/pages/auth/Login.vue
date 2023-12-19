<template>
  <div class="flex flex-col items-center justify-center w-full">
    <span class="text-2xl font-bold mb-4">Login to Your Account</span>
    <form @submit.prevent="login" class="w-1/3">
      <div class="my-auto border-gray-200 p-8 border-2 rounded-md">
        <!--Email-->
        <div>
          <label for="email" class="label">E-mail (username)</label>
          <input id="email" v-model="form.email" type="text" class="input" />
          <div v-if="form.errors.email" class="input-error">
            {{ form.errors.email }}
          </div>
        </div>

        <!--Password-->
        <div class="mt-4">
          <label for="password" class="label">Password</label>
          <input
            id="password"
            v-model="form.password"
            type="password"
            class="input"
          />
          <div v-if="form.errors.password" class="input-error">
            {{ form.errors.password }}
          </div>
        </div>

        <div class="mt-4 flex flex-col gap-1">
          <button class="btn-primary w-full" type="submit">Login</button>
          <span class="text-sm flex items-center gap-2"
            >No Account Yet?
            <Link :href="route('register.create')" class="text-indigo-600">Register</Link></span
          >
        </div>
      </div>
    </form>
  </div>
</template>

<script setup>
import { useForm, Link } from "@inertiajs/vue3";
const form = useForm({
  email: null,
  password: null,
});
const login = () => form.post(route("login.store"));
</script>