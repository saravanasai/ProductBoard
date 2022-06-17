<template>
  <MainLayout>
    <template v-slot:top-section>
      <Tittle>
        <template v-slot:pre-tittle>New Request</template>
        <template v-slot:page-tittle>New Key Request </template>
        <template v-slot:right-side-content>
          <div class="btn-list">
            <span class="d-none d-sm-inline">
              <router-link :to="{ name: 'home' }" class="btn btn-dark"
                >Home</router-link
              >
            </span>
            <router-link
              class="btn btn-primary d-none d-sm-inline-block"
              :to="{ name: 'new-product' }"
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
              Add New Product
            </router-link>
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
      <div class="card p-5">
        <div class="row row-cards">
          <div class="col-md-12" v-if="requestes">
            <template v-for="request in requestes.data" :key="request.id">
              <ActivationRequestCard
                :requestId="request.id"
                :requestDomine="request.domine"
                :requestIp="request.ipaddress"
                :username="request.username"
                :email="request.email"
                :productName="request.product.product_name"
                :productId="request.product.product_id"
              />
            </template>
          </div>
        </div>
        <div class="float-end">
          <Pagination
            :data="requestes"
            :align="'right'"
            @pagination-change-page="getActivationRequests"
          />
        </div>
      </div>
    </template>
  </MainLayout>
</template>

<script>
import MainLayout from "../../layout/Main/Main.vue";
import Tittle from "../../layout/Tittle/Tittle.vue";
import useKeyRequest from "../../composables/useKeyRequest";
import LaravelVuePagination from "laravel-vue-pagination";
import { onMounted } from "@vue/runtime-core";
import ActivationRequestCard from "../../../components/Widget/ActivationRequestCard/ActivationRequestCard.vue";
export default {
  components: {
    MainLayout,
    Tittle,
    Pagination: LaravelVuePagination,
    ActivationRequestCard
},
  setup() {
    const { isLoading, requestes,getActivationRequests, getActivationRequest,
        destroyActivationRequest, } = useKeyRequest();

    const handleDelete = (id) => {
      destroyProduct(id).then((e) => {
        if (e.status == 200) {
          getActivationRequests(1);
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Product Deleted",
            showConfirmButton: false,
            toast: true,
            timer: 1500,
          });
        }
      });
    };

    onMounted(() => {
      getActivationRequests(1);
    });

    return { requestes, isLoading, handleDelete, getActivationRequests };
  },
};
</script>

<style>
</style>
