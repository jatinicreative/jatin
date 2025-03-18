<template>
  <div v-if="showEditModal" class="modal d-block">
    <div class="modal-dialog">
      <div class="modal-content">
        <h5 class="modal-title">Edit Employee Details</h5>
        <form @submit.prevent="updateEmployee">
          <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" v-model="produceData.firstName" class="form-control" required />
          </div>
          <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" v-model="produceData.lastName" class="form-control" required />
          </div>
          <div class="form-group">
            <label>Image:</label>
            <div>
              <img :src="produceData.image" alt="Product Image" style="width: 100px; height: 100px;" />
              <input type="file" @change="handleFileUpload" class="form-control" />
            <label class="form-label">Birth Date</label>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="text" v-model="produceData.age"  class="form-control" required />
          </div>
          <div class="mb-3">
            <input type="date" v-model="produceData.birthDate"  class="form-control" required />
          </div>
          <div class="modal-actions">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" @click="$emit('close')" class="btn btn-secondary">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props:{
    showEditModal: Boolean,
    employee: Object,
  },
  data(){
    return{
      produceData: { ...this.employee}
    }
  },
  watch:{
    employee(newEmployee){
      this.produceData = { ...newEmployee}
    }
  },
  methods:{
    handleFileUpload(event){
      const file = event.target.files[0];
      if(file){
        const reader = new FileReader();
        reader.onload = () => {
          this.produceData.image = reader.result;
        };
        reader.readAsDataURL(file);
      }
    },
    updateEmployee(){
      this.$emit('update-employee',this.produceData);
    }
  }
}
</script>