<script src="./product.js"/>

<template>
  <div class="container mt-5" style="width: max-content">
    <h2 class="text-center mt-5 mb-3">All Product Listing</h2>
    <div class="card" style="width: 1200px">
      <div class="card-header" style="display: flex">
        <select v-model="selectedCategory" style="margin: auto">
          <option value="">Select Category</option>
          <option value="men's clothing">men's clothing</option>
          <option value="electronics">electronics</option>
          <option value="women's clothing">women's clothing</option>
          <option value="jewelery">jewelery</option>
        </select>
        <h6 style="margin: auto">Sorting with Title:-</h6>
        <select v-model="sortOrder" >
          <option value="">Select</option>
          <option value="asc">Ascending</option>
          <option value="desc">Descending</option>
        </select>
        <h6 style="margin: auto">Sorting with Price:-</h6>
        <select v-model="sortKey" style="margin-right: 20px">
          <option value="">Select</option>
          <option value="asc">Ascending</option>
          <option value="desc">Descending</option>
        </select>
        <input type="text" v-model="searchQuery" placeholder="Search Name here..." >
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Sr No</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="(product, index) in paginatedProducts" :key="product.id">
            <td>{{ index + 1}}</td>
            <td>{{ product.title }}</td>
            <td>₹{{ product.price }}</td>
            <td>{{ product.category }}</td>
            <td>
              <button @click="deleteProduct(product.id)" class="btn btn-outline-danger">Delete</button>
            </td>
          </tr>
          </tbody>
        </table>
        <div style="display: flex">
          <h6>Total Products:- {{ filteredProducts.length }}</h6>
          <h6 style="margin-left: 800px">Total Price:- {{ totalPrice.toFixed(2) }}</h6>
        </div>
        <nav>
          <ul class="pagination justify-content-center">
            <li class="page-item" :class="{ disabled: currentPage === 1}">
              <button @click="changePage(currentPage -1)" class="page-link">Previous</button>
            </li>
            <li
                v-for="page in totalPages"
                class="page-item"
                :key="page"
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
  </div>
</template>
