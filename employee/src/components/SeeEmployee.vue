<template>
<div v-if="showSeeModal" class="modal d-block" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Employee Details</h5>
        <button type="button" class="btn-close" @click="$emit('close')"></button>
        </div>
        <div class="modal-body">
          <div v-if="employee">
            <p><strong>First Name:-</strong> {{ employee.firstName }}</p>
            <p><strong>Last Name:-</strong> {{ employee.lastName }}</p>
            <p><strong>Profile:-</strong></p>
            <div>
              <img :src="employee.image" alt="Product Image" style="width: 100px; height: 100px;" />
            </div>
            <p><strong>Age:-</strong> {{ employee.age }}</p>
            <p><strong>Gender:-</strong> {{ employee.gender }}</p>
            <p><strong>Birth Date:-</strong> {{ employee.birthDate }}</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="$emit('close')">Close</button>
          </div>
        </div>
    </div>
  </div>
</div>

  <div v-if="showSeeModal" class="modal-backdrop fade show"></div>
</template>

<script>
export default {
  props:{
      showSeeModal: Boolean,
      employee: Object,
  }
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
  max-width: 400px;
}
</style>