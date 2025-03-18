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
  methods: {
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
            <tr v-for="(employee, index) in employees" :key="employee.id">
              <td>{{ index + 1 }}</td>
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
      </div>
    </div>
  </div>
  <AddEmployee
    :showModal="showAddModal"
    @add-employee="addEmployee"
    @close="showAddModal = false"
  />
  <SeeEmployee
    :showSeeModal="showSeeModal"
    :employee="selectedEmployee"
    @close="showSeeModal=false"
  />
  <EditEmployee
    :showEditModal="showEditModal"
    :employee="selectedEmployee"
    @update-employee="updateEmployee"
    @close="showEditModal=false"
  />
</template>

<style scoped>

</style>
