<template>
  <a target="_blank" :href="`/user/resume/viewResume/${resume.id}`">
    <img src="/public/assets/pdf.png" alt="" class="w-20" />
  </a>
  <div class="flex flex-col gap-4">
    <div class="flex flex-col gap-1/2">
      <span class="text-2xl font-bold">{{ resume.user.name }}</span>
      <span class="text-sm">{{ resume.open_review_description }}</span>
    </div>
    <button
      v-if="isLoggedIn"
      @click="$emit('toggleReviewForm', resume.id)"
      class="px-4 py-2 text-white rounded-md"
      :class="
        isFormVisible
          ? 'bg-red-600 hover:bg-red-800'
          : 'bg-indigo-600 hover:bg-indigo-800'
      "
    >
      {{ isFormVisible ? "Close" : "Write a review" }}
    </button>
    <span v-else class="text-red-600 font-bold"
      >Please login to write your review</span
    >
  </div>
</template>

<script setup>
defineProps({
  resume: Object,
  isLoggedIn: Boolean,
  isFormVisible: Boolean,
});

defineEmits(["toggleReviewForm"]);
</script>