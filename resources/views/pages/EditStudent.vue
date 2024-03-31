<template>
    <div class="py-12">
        <div class="container">

            <h3 align="center" class="mt-5">Student Management</h3>

            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">

                    <div class="form-area">
                        <form @submit.prevent="updateStudent">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Student Name</label>
                                    <input type="text" class="form-control" v-model="student.name">
                                </div>
                                <div class="col-md-6">
                                    <label>Student DOB</label>
                                    <input type="date" class="form-control" v-model="student.dob">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" v-model="student.phone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Image</label>
                                    <input type="file" class="form-control" @change="handleImageChange">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Status</label>
                                    <select name="status" class="form-control" v-model="student.status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { usePage, useForm } from '@inertiajs/inertia-vue3';

export default {
    props: ['student'],
    setup(props) {
        const { data, post, errors } = useForm({
            name: props.student.name,
            dob: props.student.dob,
            phone: props.student.phone,
            status: props.student.status,
            image: null,
        });

        const updateStudent = () => {
            post(route('student.update', props.student.id), {
                onSuccess: () => {
                    // Redirect or show success message
                },
            });
        };

        const handleImageChange = (event) => {
            data.image = event.target.files[0];
        };

        return {
            student: props.student,
            updateStudent,
            handleImageChange,
        };
    },
};
</script>
