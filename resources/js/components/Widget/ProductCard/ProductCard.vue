<template>
  <div class="card mb-2">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <div class="font-weight-medium">
            <h2>{{ productName }}</h2>
          </div>
          <div class="text-muted">{{ description }}</div>
        </div>
        <div class="col-auto">
          <span class="avatar avatar-xl rounded"
            >{{ productName[0] }}{{ productName[1] }}</span
          >
        </div>
      </div>
      <div class="row">
        <div class="d-flex justify-content-start">
          <button type="button" @click="()=>handleDelete(productId)" class="btn btn-danger w-15 mx-1">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="icon icon-tabler icon-tabler-trash"
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
                Download more icon variants from https://tabler-icons.io/i/trash
              </desc>
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <line x1="4" y1="7" x2="20" y2="7"></line>
              <line x1="10" y1="11" x2="10" y2="17"></line>
              <line x1="14" y1="11" x2="14" y2="17"></line>
              <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
              <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path></svg
            >Delete</button
          >
          <router-link
            :to="{ name: 'edit-product', params: { id: productId } }"
            class="btn btn-dark w-15 mx-1"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="icon icon-tabler icon-tabler-pencil"
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
                https://tabler-icons.io/i/pencil
              </desc>
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path
                d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"
              ></path>
              <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
            </svg>
            Edit</router-link
          >
          <a href="#" class="btn btn-success w-15 mx-1">
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
              <line x1="15" y1="8" x2="17" y2="10"></line></svg
            >keys</a
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    productId: Number,
    productName: String,
    description: String,
    handleDelete:Function
  },
  setup() {},
};
</script>

<style></style>
