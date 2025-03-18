<template>
  <div v-if="showModal" class="modal d-block" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Employee</h5>
          <button type="button" class="btn-close" @click="$emit('close')"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="submitEmployee">
            <div class="mb-3">
              <label class="form-label">First Name</label>
              <input
                type="text"
                v-model="employee.firstName"
                placeholder="Enter First Name..."
                class="form-control"
                required
              />
            </div>
            <div class="mb-3">
              <label class="form-label">Last Name</label>
              <input
                type="text"
                v-model="employee.lastName"
                placeholder="Enter Last Name..."
                class="form-control"
                required
              />
            </div>
            <div class="mb-3">
              <label class="form-label">Profile</label>
              <input type="file" @change="handleFileUpload" class="form-control" required />
              <img
                v-if="employee.image"
                :src="employee.image"
                alt="Product Image"
                style="width: 100px; height: 100px"
              />
            </div>
            <div class="mb-3">
              <label class="form-label">Age</label>
              <input
                type="number"
                v-model="employee.age"
                placeholder="Enter Age..."
                class="form-control"
                required
              />
            </div>
            <div class="mb-3">
              <label class="form-label">Gender</label>
              <input type="radio" id="Male" value="Male" v-model="employee.gender" />Male
              <input type="radio" id="Female" value="Female" v-model="employee.gender" />Female
            </div>
            <div class="mb-3">
              <label class="form-label">Birth Date</label>
              <input
                type="date"
                v-model="employee.birthDate"
                placeholder="Enter Birth Date..."
                class="form-control"
                required
              />
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Add</button>
              <button type="button" class="btn btn-secondary" @click="$emit('close')">
                Cancel
              </button>
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
  data() {
    return {
      employee: {
        firstName: '',
        lastName: '',
        image: '',
        age: '',
        birthDate: '',
        gender: '',
      },
    }
  },
  props: {
    showModal: Boolean,
  },
  methods: {
    handleFileUpload(event) {
      const file = event.target.files[0]
      if (file) {
        const reader = new FileReader()
        reader.onload = () => {
          this.employee.image = reader.result
        }
        reader.readAsDataURL(file)
      }
    },
    submitEmployee() {
      this.$emit('add-employee', { ...this.employee })

      this.employee = {
        firstName: '',
        lastName: '',
        image: '',
        age: '',
        birthDate: '',
      }

      this.$emit('close')
    },
  },
}
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
