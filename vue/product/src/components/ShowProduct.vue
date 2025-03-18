<template>
  <div v-if="showDetailsModal" class="modal d-block" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Product Details</h5>
          <button type="button" class="btn-close" @click="$emit('close')"></button>
        </div>
        <div class="modal-body">
          <div v-if="product">
            <p><strong>Title:</strong> {{ product.title }}</p>
            <p><strong>Price:</strong> ₹{{ product.price }}</p>
            <p><strong>Category:</strong> {{ product.category }}</p>
            <p><strong>Image:</strong></p>
            <div>
              <img :src="product.image" alt="Product Image" style="width: 100px; height: 100px;" />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" @click="$emit('close')">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div v-if="showDetailsModal" class="modal-backdrop fade show"></div>
</template>

<script>
export default {
  props: {
    product: Object,
    showDetailsModal: Boolean,
  },
};
</script>

<style scoped>
.modal-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1040;
}

.modal {
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1050;
}

.modal-dialog {
  max-width: 400px;
}
</style>