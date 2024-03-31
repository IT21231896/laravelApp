<template>
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Student Name</th>
                <th scope="col">DOB</th>
                <th scope="col">Phone</th>
                <th scope="col">Is Active</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="student in students" :key="student.id">
                <td>{{ student.id }}</td>
                <td>{{ student.name }}</td>
                <td>{{ student.dob }}</td>
                <td>{{ student.phone }}</td>
                <td>{{ student.status }}</td>
                <td><img :src="student.image" style="width: 70px; height:70px;" alt="Img" /></td>
                <td>
                    <a :href="`/students/${student.id}/edit`">
                        <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                        </button>
                    </a>
                    <button @click="deleteStudent(student.id)" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props: ['students'],
    methods: {
        deleteStudent(studentId) {
            // Delete student using Inertia
            if (confirm('Are you sure you want to delete this student?')) {
                this.$inertia.delete(route('student.destroy', studentId));
            }
        }
    }
}
</script>
