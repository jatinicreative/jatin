<template>
  <div v-if="showModal" class="modal d-block" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Product</h5>
          <button type="button" class="btn-close" @click="$emit('close')"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="submitProduct">
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input type="text" v-model="product.title" class="form-control" required />
            </div>
            <div class="mb-3">
              <label class="form-label">Price</label>
              <input type="number" v-model="product.price" class="form-control" required />
            </div>
            <div class="mb-3">
              <label class="form-label">Image</label>
              <input type="text" v-model="product.image" class="form-control" required />
            </div>
            <div class="mb-3">
              <label class="form-label">Category</label>
              <input type="text" v-model="product.category" class="form-control" required />
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Add</button>
              <button type="button" class="btn btn-secondary" @click="$emit('close')">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div v-if="showModal" class="modal-backdrop fade show"></div>
</template>

<script>
export default {
  props: {
    showModal: Boolean,
  },
  data() {
    return {
      product: {
        title: '',
        price: '',
        image: '',
        category: '',
      },
    };
  },
  methods: {
    submitProduct() {
      this.$emit('add-product', { ...this.product });

      this.product = {
        title: '',
        price: '',
        image: '',
        category: '',
      };

      this.$emit('close');
    },
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
  max-width: 500px;
}
</style>