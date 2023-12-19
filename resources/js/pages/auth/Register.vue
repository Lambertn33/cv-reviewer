<template>
  <div class="flex flex-col items-center justify-center w-full">
    <span class="text-2xl font-bold mb-4">Create an Account</span>
    <form @submit.prevent="register" class="w-1/3">
      <div class="my-auto border-gray-200 p-8 border-2 rounded-md">
        <!--Email-->
        <div>
          <label for="names" class="label">Your names</label>
          <input id="names" v-model="form.name" type="text" class="input" />
          <div v-if="form.errors.name" class="input-error">
            {{ form.errors.name }}
          </div>
        </div>

        <!--Email-->
        <div class="mt-4">
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

        <!--Password confirmation-->
        <div class="mt-4">
          <label for="password_confirmation" class="label"
            >Password Confirmation</label
          >
          <input
            id="password_confirmation"
            v-model="form.password_confirmation"
            type="password"
            class="input"
          />
          <div v-if="form.errors.password_confirmation" class="input-error">
            {{ form.errors.password_confirmation }}
          </div>
        </div>

        <div class="mt-4 flex flex-col gap-1">
          <button class="btn-primary w-full" type="submit">Register</button>
          <span class="text-sm flex items-center gap-2"
            >Already have an account?
            <Link :href="route('login.create')" class="text-indigo-600"
              >Login</Link
            ></span
          >
        </div>
      </div>
    </form>
  </div>
</template>
  
  <script setup>
import { useForm, Link } from "@inertiajs/vue3";
const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null
});
const register = () => form.post(route("register.store"));
</script>