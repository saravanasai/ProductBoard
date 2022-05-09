<template>
  <MainLayout>
    <template v-slot:top-section>
      <Tittle>
        <template v-slot:pre-tittle>Home</template>
        <template v-slot:page-tittle> Product Manager </template>
        <template v-slot:right-side-content>
          <div class="btn-list">
            <span class="d-none d-sm-inline">
              <a href="#" class="btn btn-dark"> New Project </a>
            </span>
            <a
              href="#"
              class="btn btn-primary d-none d-sm-inline-block"
              data-bs-toggle="modal"
              data-bs-target="#modal-report"
            >
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="icon icon-tabler icon-tabler-key"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <desc>
                  Download more icon variants from https://tabler-icons.io/i/key
                </desc>
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="8" cy="15" r="4"></circle>
                <line x1="10.85" y1="12.15" x2="19" y2="4"></line>
                <line x1="18" y1="5" x2="20" y2="7"></line>
                <line x1="15" y1="8" x2="17" y2="10"></line>
              </svg>
              Generate Key
            </a>
            <a
              href="#"
              class="btn btn-primary d-sm-none btn-icon"
              data-bs-toggle="modal"
              data-bs-target="#modal-report"
              aria-label="Create new report"
            >
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="icon"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
              </svg>
            </a>
          </div>
        </template>
      </Tittle>
    </template>
    <template v-slot:content>
      <hero-card />
    </template>
  </MainLayout>
</template>

<script>
import Tittle from "../../layout/Tittle/Tittle.vue";
import MainLayout from "../../layout/Main/Main.vue";
import HeroCard from "../../../components/Widget/HeroCard/HeroCard.vue";
import useAuth from "../../composables/useAuth/index";
import { inject, onMounted } from "@vue/runtime-core";
export default {
  components: { Tittle, MainLayout, HeroCard },
  setup() {
    return {};
  },
};
</script>

<style lang="scss" scoped>
</style>
