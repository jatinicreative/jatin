<template>
  <div v-if="showEditModal" class="modal-overlay">
      <div class="modal-content">
        <h5>Edit Employee Details</h5>
        <form @submit.prevent="updateEmployee">
          <div class="form-group">
            <label>First Name</label>
            <input v-model="produceData.firstName" class="form-control" required />
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input v-model="produceData.lastName" class="form-control" required />
          </div>
          <div class="form-group">
            <label>Image:</label>
            <div>
              <img :src="produceData.image" alt="Product Image" style="width: 100px; height: 100px;" />
              <input type="file" @change="handleFileUpload" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label>Age</label>
            <input v-model="produceData.age"  class="form-control" required />
          </div>
          <div class="form-group">
            <label>Birth Date</label>
            <input v-model="produceData.birthDate"  class="form-control" required />
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