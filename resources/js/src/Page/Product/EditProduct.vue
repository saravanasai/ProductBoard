<template>
  <MainLayout>
    <template v-slot:top-section>
      <Tittle>
        <template v-slot:pre-tittle>EDIT PRODUCT {{ id }}</template>
        <template v-slot:page-tittle>EDIT</template>
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
            <h3 class="card-title">Edit Product Form</h3>
          </div>
          <div class="card-body">
            <form>
              <div class="form-group mb-3">
                <label class="form-label">Product Name</label>
                <div>
                  <input
                    type="text"
                    v-model="product.product_name"
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
                    v-model="product.description"
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
                  @click="handleUpdate"
                  type="button"
                  class="btn btn-primary float-end"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-refresh"
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
                      https://tabler-icons.io/i/refresh
                    </desc>
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                  </svg>
                  Update
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
import { onMounted, reactive, toRefs } from "@vue/runtime-core";
import Swal from "sweetalert2";
import useNavigation from "../../composables/useNavigation";
import useProduct from "../../composables/useProduct";
import MainLayout from "../../layout/Main/Main.vue";
import Tittle from "../../layout/Tittle/Tittle.vue";

export default {
  props: {
    id: Number,
  },
  components: { MainLayout, Tittle },
  setup(props) {
    const { router, route } = useNavigation();

    const { product, updateProduct, getProduct } = useProduct();

    const handleUpdate = () => {
      updateProduct(props.id).then((e) => {
        if (e.status == 200) {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            toast: true,
            timer: 1500,
          }).then(() => {
            router.push({ name: "products" });
          });
        }
      });

      console.log(product);
    };

    onMounted(() => {
      getProduct(props.id);
    });

    return {
      product,
      handleUpdate,
    };
  },
};
</script>

<style>
</style>
