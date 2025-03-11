
<script>
export default {
  components: {

  },
  data() {
    return {
      products: [],
      showModal: false,
    };
  },
  async created() {
    try {
      const response = await fetch('https://fakestoreapi.com/products');
      this.products = await response.json();
    } catch (error) {
      console.error('Error fetching products:', error);
    }
  },
};
</script>
<template>
  <div class="container mt-5" style="width: max-content">
    <h2 class="text-center mt-5 mb-3">All Product Details...</h2>

    <div class="card" style="width: 1200px">
      <div class="card-header">
        <button @click="showModal = true" class="btn btn-outline-primary">
          Add New Product
        </button>
      </div>

      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Category</th>
            <th style="width: 220px">Actions</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="(product, index) in products" :key="product.id">
            <td>{{ index + 1 }}</td>
            <td>{{ product.title }}</td>
            <td>{{ product.price }}</td>
            <td>
              <img :src="product.image" alt="Product Image" style="width: 50px; height: 50px;" />
            </td>
            <td>{{ product.category }}</td>
            <td>
              <button class="btn btn-outline-info">Show</button>
              <button class="btn btn-outline-warning">Edit</button>
              <button class="btn btn-outline-danger">Delete</button>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

