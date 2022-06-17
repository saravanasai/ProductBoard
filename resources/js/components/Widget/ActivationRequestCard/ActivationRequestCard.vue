<template>
  <div class="card mb-2">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <div class="font-weight-medium">
            <h2>{{ username }} - {{ email }}</h2>
            <h4>{{ requestDomine }}</h4>
            <h5>Ip-address:{{ requestIp }}</h5>
          </div>
          <div class="text-muted">{{ description }}</div>
        </div>
        <div class="col-auto">
          <span class="avatar avatar-xl rounded"
            >{{ username[0] }}{{ username[1] }}</span
          >
        </div>
      </div>
      <div class="row">
        <div class="d-flex justify-content-start">
          <div>
            <h4>To Product :{{ productName }}</h4>
            <h6>Product ID :{{ productId }}</h6>
          </div>
        </div>
          <div class="float-end">
            <router-link
              :to="{ name: 'edit-product', params: { id: requestId } }"
              class=" float-end btn btn-success w-15 mx-1"
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
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
              </svg>
              Process Request</router-link
            >
          </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    requestId: Number,
    requestDomine: String,
    requestIp: String,
    username: String,
    email: String,
    productName: String,
    productId: String,
  },
  setup() {},
};
</script>

<style></style>
