<script>
import AddEmployee from '@/components/AddEmployee.vue'
import SeeEmployee from '@/components/SeeEmployee.vue'
import EditEmployee from '@/components/EditEmployee.vue'
export default {
  components: {
    AddEmployee,
    SeeEmployee,
    EditEmployee,
  },
  data() {
    return {
      employees: [],
      showAddModal: false,
      showSeeModal: false,
      selectedEmployee: null,
      showEditModal: false,
      currentPage: 1,
      pageSize: 5,
      searchQuery: null,
      selectedGender:'',
    }
  },
  async created() {
    try {
      const response = await fetch('https://dummyjson.com/users')
      const data = await response.json()
      this.employees = data.users
    } catch (error) {
      console.error('Error fetching data', error)
    }
  },
  computed:{
    filteredProducts(){
      let filtered = this.employees
      if(this.searchQuery){
        filtered = filtered.filter(employee => employee.firstName.toLowerCase().includes(this.searchQuery.toLowerCase()) || employee.lastName.toLowerCase().includes(this.searchQuery.toLowerCase()))
      }
      if(this.selectedGender){
        filtered = filtered.filter(employee => employee.gender === this.selectedGender)
      }
      return filtered;
    },
    totalPages(){
      return Math.ceil(this.employees.length / this.pageSize);
    },
    paginatedEmployees(){
      const start = (this.currentPage-1)*this.pageSize;
      const end = start+ this.pageSize;
      return this.filteredProducts.slice(start,end);
    }
  },
  methods: {
    changePage(page){
      if(page>=1 && page<=this.totalPages){
        this.currentPage = page;
      }
    },
    addEmployee(newEmployee) {
      this.employees.unshift({ id: Date.now(), ...newEmployee })
      this.showAddModal = false
    },
    showEmployee(employee) {
      this.selectedEmployee = employee;
      this.showSeeModal = true;
    },
    deleteEmployee(id){
      if(confirm("Are you sure you want to delete this employee??")){
        this.employees = this.employees.filter(employee => employee.id !== id);
      }
    },
    editEmployee(employee){
      this.selectedEmployee =employee;
      this.showEditModal = true;
    },
    updateEmployee(updatedEmployee){
      const index = this.employees.findIndex(e => e.id === updatedEmployee.id);
      if(index !== -1){
        this.employees.splice(index,1,updatedEmployee);
      }
      this.showEditModal = false;
    }
  },
}
</script>

<template>
  <div class="container mt-5" style="width: max-content">
    <h2 class="text-center mt-5 mb-3">Employee Listing</h2>
    <div class="card" style="width: 1200px">
      <div class="card-header">
        <button @click="showAddModal = true" class="btn btn-outline-primary">
          Add New Employee
        </button>
        <input type="text" placeholder="Search Employee Name..." v-model="searchQuery" style="margin-left: 100px">
        <select v-model="selectedGender" style="margin-left: 500px">
          <option value="">Select Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Image</th>
              <th>Age</th>
              <th>Gender</th>
              <th>Birth Date</th>
              <th style="width: 250px">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(employee, index) in paginatedEmployees" :key="employee.id">
              <td>{{ (currentPage - 1) * pageSize + index + 1}}</td>
              <td>{{ employee.firstName }}</td>
              <td>{{ employee.lastName }}</td>
              <td>
                <img :src="employee.image" alt="Product Image" style="width: 50px; height: 50px" />
              </td>
              <td>{{ employee.age }}</td>
              <td>{{ employee.gender }}</td>
              <td>{{ employee.birthDate }}</td>
              <td>
                <button @click="showEmployee(employee)" style="margin: 3px" class="btn btn-outline-info">Show</button>
                <button @click="editEmployee(employee)" style="margin: 3px" class="btn btn-outline-warning">Edit</button>
                <button @click="deleteEmployee(employee.id)" style="margin: 3px" class="btn btn-outline-danger">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
        <div style="display: flex">

        </div>
        <nav>
          <ul class="pagination justify-content-center">
            <li class="page-item" :class="{ disabled:currentPage===1}">
              <button @click="changePage(currentPage-1)" class="page-link">Previous</button>
            </li>
            <li
              v-for="page in totalPages"
              :key="page"
              class="page-item"
              :class="{ active:currentPage===page}"
            >
            <button @click="changePage(page)" class="page-link">{{ page }}</button>
            </li>
            <li class="page-item" :class="{ disabled:currentPage===totalPages}">
              <button @click="changePage(currentPage+1)" class="page-link">Next</button>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <AddEmployee
    :showModal="showAddModal"
    @add-employee="addEmployee"
    @close="showAddModal = false"
  />
  <SeeEmployee
    @update-employee="updateEmployee"
    :showSeeModal="showSeeModal"
    :employee="selectedEmployee"
    @close="showSeeModal=false"
  />
  <EditEmployee
    :showEditModal="showEditModal"
    :employee="selectedEmployee"
    @close="showEditModal=false"
  />
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
