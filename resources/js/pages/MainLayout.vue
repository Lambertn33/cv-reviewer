<template>
  <header
    class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full"
  >
    <div class="container mx-auto">
      <nav class="p-4 flex items-center justify-between">
        <div class="text-lg font-medium">
          <Link :href="route('resumes.index')">Resumes</Link>
        </div>
        <div
          class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center"
        >
          <Link :href="route('resumes.index')">Resumes List</Link>
        </div>
        <div v-if="user" class="flex items-center gap-2">
          <Link href="">
            {{ user.name }}
          </Link>
          <Link
            :href="route('login.destroy', user.id)"
            method="delete"
            as="button"
          >
            Sign out
          </Link>
        </div>
        <div v-else>
          <div class="flex gap-4 items-center">
            <Link :href="route('login.create')">Sign In</Link>
            <Link :href="route('register.create')">Sign up</Link>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <main class="container mx-auto p-4 w-full">
    <div
      v-if="hasSuccess"
      class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2"
    >
      {{ hasSuccess }}
    </div>
    <slot></slot>
  </main>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();
const hasSuccess = computed(() => page.props.flash.success);
const user = computed(() => page.props.user);
</script>