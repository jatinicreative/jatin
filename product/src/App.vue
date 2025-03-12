
<script>
import AddProduct from '@/components/AddProduct.vue'
import ShowProduct from '@/components/ShowProduct.vue'
import EditProduct from '@/components/EditProduct.vue'
export default {
  components: {
    AddProduct,
    ShowProduct,
    EditProduct,
  },
  data() {
    return {
      products: [],
      showAddModal: false,
      showDetailsModal :false,
      selectedProduct: null,
      currentPage: 1,
      pageSize: 5,
      selectedCategory: '',
      showEditModal: false,
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
  computed:{
    totalPages(){
      return Math.ceil(this.filteredProducts.length / this.pageSize);
    },
    paginatedProducts(){
      const start = (this.currentPage - 1) * this.pageSize;
      const end = start + this.pageSize;
      return this.filteredProducts.slice(start, end);
    },
    filteredProducts(){
      if(!this.selectedCategory)
      {
        return this.products;
      }
      return this.products.filter( product => product.category === this.selectedCategory )
    }
  },
  methods: {
    addProduct(newProduct){
      this.products.unshift({id: Date.now(), ...newProduct})
      this.showAddModal = false;
      this.currentPage = 1;
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
    changePage(page){
      if(page >=1 && page<= this.totalPages){
        this.currentPage = page;
      }
    },
    filterByCategory()
    {
      this.currentPage = 1;
    },
    editProduct(product){
      this.selectedProduct = { ...product };
      this.showEditModal = true;
    },
    updateProduct(updatedProduct){
      const index = this.products.findIndex(p => p.id === updatedProduct.id);
      if(index !== -1){
        this.products.splice(index,1,updatedProduct);
      }
      this.showEditModal = false;
    }
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
        <select v-model="selectedCategory" @change="filterByCategory" style="margin-left: 800px">
          <option value="">Select Category</option>
          <option value="men's clothing">men's clothing</option>
          <option value="jewelery">jewelery</option>
          <option value="electronics">electronics</option>
          <option value="women's clothing">women's clothing</option>
        </select>
      </div>

      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Sr No</th>
            <th>Title</th>
            <th>Price[₹]</th>
            <th>Image</th>
            <th>Category</th>
            <th style="width: 220px">Actions</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="(product, index) in paginatedProducts" :key="product.id">
            <td>{{ (currentPage - 1) * pageSize + index + 1}}</td>
            <td>{{ product.title }}</td>
            <td>{{ product.price }}</td>
            <td>
              <img :src="product.image" alt="Product Image" style="width: 50px; height: 50px;" />
            </td>
            <td>{{ product.category }}</td>
            <td>
              <button @click="showProduct(product)" class="btn btn-outline-info">Show</button>
              <button @click="editProduct(product)" class="btn btn-outline-warning">Edit</button>
              <button @click="deleteProduct(product.id)" class="btn btn-outline-danger">Delete</button>
            </td>
          </tr>
          </tbody>
        </table>

        <nav>
          <ul class="pagination justify-content-center">
            <li class="page-item" :class="{ disabled: currentPage === 1}">
              <button @click="changePage(currentPage -1)" class="page-link">Previous</button>
            </li>
            <li
              v-for="page in totalPages"
              :key="page"
              class="page-item"
              :class="{ active: currentPage ===page}"
              >
              <button @click="changePage(page)" class="page-link">{{ page }}</button>
            </li>
            <li class="page-item" :class="{ disabled: currentPage === totalPages}">
              <button @click="changePage(currentPage + 1)" class="page-link">Next</button>
            </li>
          </ul>
        </nav>
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
    <EditProduct
      :showEditModal = "showEditModal"
      :product = "selectedProduct"
      @update-product="updateProduct"
      @close = "showEditModal = false"
    />
  </div>
</template>

<style scoped>
.pagination {
  margin-top: 20px;
}

.page-item.active .page-link {
  background-color: #007bff;
  border-color: #007bff;
}

.page-item.disabled .page-link {
  color: #6c757d;
}
</style>


