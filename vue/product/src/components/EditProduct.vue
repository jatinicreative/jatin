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
          <input type="number" step="0.01" v-model="productData.price" class="form-control" required />
        </div>
        <div class="form-group">
          <label>Category:</label>
          <select v-model="productData.category" class="form-control" required>
            <option v-for="category in categories" :key="category" :value="category">{{ category }}</option>
          </select>
        </div>
        <div class="form-group">
          <label>Image:</label>
          <div>
            <img :src="productData.image" alt="Product Image" style="width: 100px; height: 100px;" />
            <input type="file" @change="handleFileUpload" class="form-control" />
          </div>
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
    categories: Array,
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
    handleFileUpload(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = () => {
          this.productData.image = reader.result;
        };
        reader.readAsDataURL(file);
      }
    },
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