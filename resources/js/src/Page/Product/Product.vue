<template>
  <MainLayout>
    <template v-slot:top-section>
      <Tittle>
        <template v-slot:pre-tittle>My Products</template>
        <template v-slot:page-tittle>My Products </template>
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
          <div class="col-md-12" v-if="products">
            <template v-for="product in products" :key="product.id">
              <ProductCard
                :productId="product.id"
                :productName="product.product_name"
                :description="product.description"
                :handleDelete="handleDelete"
              />
            </template>
          </div>
        </div>
      </div>
    </template>
  </MainLayout>
</template>

<script>
import MainLayout from "../../layout/Main/Main.vue";
import Tittle from "../../layout/Tittle/Tittle.vue";
import ProductCard from "../../../components/Widget/ProductCard/ProductCard.vue";
import useProduct from "../../composables/useProduct";
import { onMounted } from "@vue/runtime-core";
export default {
  components: { MainLayout, Tittle, ProductCard },
  setup() {
    const { isLoading, products, destroyProduct, getProducts } = useProduct();

    const handleDelete = (id) => {
      destroyProduct(id).then((e) => {
        if (e.status == 200) {
          getProducts();
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
      getProducts();
    });

    return { products, isLoading, handleDelete };
  },
};
</script>

<style>
</style>
