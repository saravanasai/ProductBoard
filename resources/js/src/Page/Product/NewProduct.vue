<template>
  <MainLayout>
    <template v-slot:top-section>
      <Tittle>
        <template v-slot:pre-tittle>ADD NEW PRODUCT</template>
        <template v-slot:page-tittle>ADD NEW </template>
        <template v-slot:right-side-content>
          <div class="btn-list">
            <span class="d-none d-sm-inline">
              <router-link :to="{ name: 'home' }" class="btn btn-dark"
                >Home</router-link
              >
            </span>
            <button class="btn btn-primary" @click="this.$router.go(-1)">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="icon icon-tabler icon-tabler-arrow-left"
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
                  Download more icon variants from
                  https://tabler-icons.io/i/arrow-left
                </desc>
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <line x1="5" y1="12" x2="11" y2="18"></line>
                <line x1="5" y1="12" x2="11" y2="6"></line>
              </svg>
              Back
            </button>
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
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Add New Product Form</h3>
          </div>
          <div class="card-body">
            <form>
              <div class="form-group mb-3">
                <label class="form-label">Product Name</label>
                <div>
                  <input
                    type="text"
                    v-model="product_name"
                    class="form-control"
                    aria-describedby="emailHelp"
                    placeholder="Enter Product Name"
                  />
                </div>
              </div>
              <div class="form-group mb-3">
                <div class="mb-3">
                  <label class="form-label">Product Description </label>
                  <textarea
                    v-model="product_description"
                    class="form-control"
                    name="example-textarea-input"
                    rows="6"
                    maxlength="100"
                    placeholder="Content.."
                  ></textarea>
                </div>
              </div>

              <div class="form-footer">
                <button
                  @click="handleAddNewProduct"
                  type="button"
                  class="btn btn-primary float-end"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-circle-plus"
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
                      Download more icon variants from
                      https://tabler-icons.io/i/circle-plus
                    </desc>
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <line x1="9" y1="12" x2="15" y2="12"></line>
                    <line x1="12" y1="9" x2="12" y2="15"></line>
                  </svg>
                  Create
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </template>
  </MainLayout>
</template>

<script>
import { reactive, toRefs } from "@vue/reactivity";
import MainLayout from "../../layout/Main/Main.vue";
import Tittle from "../../layout/Tittle/Tittle.vue";
import useProduct from "../../composables/useProduct";
import Swal from "sweetalert2";
import useNavigation from "../../composables/useNavigation";

export default {
  components: { MainLayout, Tittle },
  setup() {
    const { addProduct } = useProduct();
    const { router, route } = useNavigation();

    const state = reactive({
      product_name: "",
      product_description: "",
    });

    const handleAddNewProduct = () => {
      let data = {
        product_name: state.product_name,
        product_description: state.product_description,
      };

      addProduct(data).then((e) => {
        if (e.status === 201) {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Product Added",
            showConfirmButton: false,
            toast: true,
            timer: 1500,
          }).then((e) => {
            router.push({ name: "products" });
          });
        }
      });
    };

    return { ...toRefs(state), handleAddNewProduct };
  },
};
</script>

<style>
</style>
