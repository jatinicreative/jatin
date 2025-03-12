<template>
  <div v-if="showEditModal" class="modal-overlay">
    <div class="modal-content">
      <h3>Edit Product</h3>
      <form @submit.prevent="updateProduct">
        <div class="form-group">
          <label>Title:</label>
          <input v-model="productData.title" class="form-control" required />
        </div>
        <div class="form-group">
          <label>Price:</label>
          <input type="number" v-model="productData.price" class="form-control" required />
        </div>
        <div class="form-group">
          <label>Category:</label>
          <select v-model="productData.category" class="form-control" required>
            <option value="men's clothing">Men's Clothing</option>
            <option value="jewelery">Jewelery</option>
            <option value="electronics">Electronics</option>
            <option value="women's clothing">Women's Clothing</option>
          </select>
        </div>
        <div class="form-group">
          <label>Image URL:</label>
          <input v-model="productData.image" class="form-control" required />
        </div>
        <div class="modal-actions">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="button" @click="$emit('close')" class="btn btn-secondary">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    showEditModal: Boolean,
    product: Object,
  },
  data() {
    return {
      productData: { ...this.product }
    };
  },
  watch: {
    product(newProduct) {
      this.productData = { ...newProduct };
    }
  },
  methods: {
    updateProduct() {
      this.$emit('update-product', this.productData);
    }
  }
};
</script>

<style scoped>
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}
.modal-content {
  background: #fff;
  padding: 20px;
  width: 400px;
  border-radius: 8px;
}
.modal-actions {
  margin-top: 20px;
  display: flex;
  justify-content: space-between;
}
</style>