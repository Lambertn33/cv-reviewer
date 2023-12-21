<template>
  <div class="w-full">
    <span class="text-2xl font-bold mb-4 flex justify-center"
      >Resumes for review</span
    >
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
      <div
        class="border border-gray-300 py-4 px-4 flex flex-col w-4/5 shadow rounded-md gap-4 mb-4"
        v-for="resume in resumes.data"
        :key="resume.id"
      >
        <ResumeCard
          :resume="resume"
          :isLoggedIn="isLoggedIn"
          :isFormVisible="activeResumeId === resume.id"
          @toggleReviewForm="toggleReviewForm"
        />
        <!--form to write a review-->
        <div v-if="activeResumeId === resume.id">
          <form @submit.prevent="reviewResume" class="flex flex-col gap-4">
            <div class="mb-4">
              <textarea
                cols="10"
                class="input"
                v-model="form.review"
              ></textarea>
              <div v-if="form.errors.review" class="input-error">
                {{ form.errors.review }}
              </div>
            </div>
            <button class="btn-primary">Submit review</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { usePage, useForm } from "@inertiajs/vue3";
import { computed, ref, watch } from "vue";
import ResumeCard from "../../components/resumes/ResumeCard.vue";

const page = usePage();

const activeResumeId = ref(null);

const form = useForm({
  review: null,
  resume_id: activeResumeId ?? null,
  reviewed_by: page.props.user.id ?? null,
});

watch(activeResumeId, (newActiveResumeId) => {
  form.resume_id = newActiveResumeId;
});

const toggleReviewForm = (resumeId) => {
  activeResumeId.value = activeResumeId.value === resumeId ? null : resumeId;
};

const isLoggedIn = computed(() => (page.props.user ? true : false));

const reviewResume = () =>
  form.post(route("user.resume.reviews.store"), {
    onSuccess: () => {
      form.reset();
      activeResumeId.value = null;
    },
  });

defineProps({
  resumes: Object,
});
</script>