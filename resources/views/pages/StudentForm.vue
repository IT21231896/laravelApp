<template>
    <form @submit.prevent="submitForm">
        <div class="row">
            <div class="col-md-6">
                <label>Student Name</label>
                <input v-model="formData.name" type="text" class="form-control" name="name">
            </div>
            <div class="col-md-6">
                <label>Student DOB</label>
                <input v-model="formData.dob" type="date" class="form-control" name="dob">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Phone</label>
                <input v-model="formData.phone" type="text" class="form-control" name="phone">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Image</label>
                <input type="file" class="form-control" name="image" @change="handleFileChange">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Status</label>
                <select v-model="formData.status" name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">In Active</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            formData: {
                name: '',
                dob: '',
                phone: '',
                image: null,
                status: 'active'
            }
        };
    },
    methods: {
        handleFileChange(event) {
            this.formData.image = event.target.files[0];
        },
        submitForm() {
            // Submit form data using Inertia
            this.$inertia.post(route('student.store'), this.formData);
        }
    }
}
</script>
