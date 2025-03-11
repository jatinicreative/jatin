
<script>
import AddProduct from '@/components/AddProduct.vue'
import ShowProduct from '@/components/ShowProduct.vue'
export default {
  components: {
    AddProduct,
    ShowProduct,
  },
  data() {
    return {
      products: [],
      showAddModal: false,
      showDetailsModal :false,
      selectedProduct: null,
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
  methods: {
    addProduct(newProduct){
      this.products.unshift({id: Date.now(), ...newProduct})
      this.showAddModal = false;
    },
    showProduct(product) {
      this.selectedProduct = product;
      this.showDetailsModal = true;
    },
    deleteProduct(id){
      if(confirm("Are you sure? You want to delete this item?"))
      {
        this.products = this.products.filter( product => product.id !== id);
      }
    },
  }
};
</script>
<template>
  <div class="container mt-5" style="width: max-content">
    <h2 class="text-center mt-5 mb-3">All Product Details...</h2>

    <div class="card" style="width: 1200px">
      <div class="card-header">
        <button @click="showAddModal = true" class="btn btn-outline-primary">
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
              <button @click="showProduct(product)" class="btn btn-outline-info">Show</button>
              <button class="btn btn-outline-warning">Edit</button>
              <button @click="deleteProduct(product.id)" class="btn btn-outline-danger">Delete</button>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
    <AddProduct
      :showModal="showAddModal"
      @add-product="addProduct"
      @close="showAddModal = false"
    />
    <ShowProduct
      :showDetailsModal="showDetailsModal"
      :product="selectedProduct"
      @close="showDetailsModal = false"
    />
  </div>
</template>

