<template>
    <div class="flex flex-col items-center justify-center w-full">
      <span class="text-2xl font-bold mb-4">Upload Resume</span>
      <span class="mb-4">Dear {{ user.name }}, start by uploading your PDF cv</span>
      <form @submit.prevent="login" class="w-1/3">
        <div class="my-auto border-gray-200 p-8 border-2 rounded-md">
          <!--Email-->
          <div>
            <label for="resume" class="label">CV/Resume</label>
            <input id="resume" type="file" class="input" @input="addResume" />
            <div v-if="form.errors.resume" class="input-error">
              {{ form.errors.resume }}
            </div>
          </div>
          <div class="mt-4">
            <label class="label">Make Resume reviewable?</label>
            <div class="flex items-center gap-2">
              <input
                type="radio"
                id="reviewableYes"
                value="true"
                v-model="form.reviewable"
              />
              <label for="reviewableYes">Yes</label>
            </div>
            <div class="flex items-center gap-2">
              <input
                type="radio"
                id="reviewableNo"
                value="false"
                v-model="form.reviewable"
              />
              <label for="reviewableNo">No</label>
            </div>
          </div>
          <div v-if="isResumeReviewable">
            <label for="resumeReview" class="label">Review Description</label>
            <textarea
              id="resumeReview"
              cols="30"
              rows="4"
              class="input"
              v-model="form.reviewDescription"
            ></textarea>
          </div>
  
          <div class="mt-4 flex flex-col gap-1">
            <button
              class="btn-primary w-full"
              :disabled="!form.resume"
              type="submit"
            >
              Upload Resume
            </button>
          </div>
        </div>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm, usePage } from "@inertiajs/vue3";
  import { computed } from 'vue';

  const page = usePage();
  const user = page.props.user;

  const form = useForm({
    resume: null,
    reviewable: false,
    reviewDescription: null
  });

  const isResumeReviewable = computed(() => form.reviewable === 'true');
  
  const login = () => form.post(route("user.resume.store"));
  
  const addResume = (event) => (form.resume = event.target.files[0]);
  </script>