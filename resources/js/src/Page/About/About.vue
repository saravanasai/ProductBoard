<template>
  <MainLayout>
      <teleport to="#app">
          <SimpleModal />
      </teleport>
    <template v-slot:top-section>
      <Tittle>
        <template v-slot:pre-tittle>About</template>
        <template v-slot:page-tittle> About Exciteon </template>
        <template v-slot:right-side-content>
          <div class="btn-list">
            <span class="d-none d-sm-inline">
              <router-link :to="{ name: 'home' }" class="btn btn-dark">
                Home
              </router-link>
            </span>
            <button
              type="button"
              class="btn btn-primary d-none d-sm-inline-block"
              @click="this.$router.go(-1)"
            >
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              Back
            </button>
          </div>
        </template>
      </Tittle>
    </template>

    <template v-slot:content>
      <div class="row">
        <div class="col-12">
          <div class="card card-md">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col">
                  <h2 class="h3">
                    As Exciteon, we are a team that is well trained and knowledgeable when it comes to a number of web-related requirements.
                  </h2>
                  <p class="m-0 text-muted">
                     As website builders, we are dedicated to always provide the best services for all of our clients and we have never failed. Our list of endlessly satisfied customers can attest to that. We are dedicated and always available for you. Customer satisfaction is what we pride ourselves in and we have taken advantage of our uniqueness and our abilities to grow our company network across the world. As a team, we are excellent, talented, purpose driven, results-oriented, effective and efficient..
                  </p>
                </div>
                <div class="col-auto">
                  <router-link
                    :to="{ name: 'new-product' }"
                    class="btn btn-primary d-none d-sm-inline-block"
                  >
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    Track Now

                  </router-link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>

  </MainLayout>
</template>

<script>
import Tittle from "../../layout/Tittle/Tittle.vue";
import MainLayout from "../../layout/Main/Main.vue";


export default {
  components: { Tittle, MainLayout},
};
</script>

<style lang="scss" scoped>
</style>
