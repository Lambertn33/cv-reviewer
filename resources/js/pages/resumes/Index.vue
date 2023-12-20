<template>
  <div class="w-full">
    <span class="text-2xl font-bold mb-4 flex justify-center"
      >Resumes for review</span
    >
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
      <div
        v-for="resume in resumes.data"
        :key="resume.id"
        class="border border-gray-300 py-4 px-2 flex flex-col gap-8 w-4/5"
      >
        <a target="_blank" :href="`/user/resume/viewResume/${resume.id}`">
          <img src="/public/assets/pdf.png" alt="" class="w-20" />
        </a>
        <div class="flex flex-col gap-1/2">
          <span class="text-2xl font-bold">{{ resume.user.name }}</span>
          <span>{{ resume.open_review_description }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  resumes: Object,
});
</script>