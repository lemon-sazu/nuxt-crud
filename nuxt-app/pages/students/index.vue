<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Student Lists <NuxtLink to="/students/create" class="btn btn-primary btn-sm float-end">Add New</NuxtLink></h4>
            </div>
            <div class="card-body" v-if="this.students.length >0">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Created AT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr v-for="(student, index) in students" :key="index">
                            <td>{{ index+1 }}</td>
                            <td>{{ student.name }}</td>
                            <td>{{ student.course }}</td>
                            <td>{{ student.email }}</td>
                            <td>{{ student.phone }}</td>
                            <td>{{ student.created_at }}</td>
                            <td>
                                <NuxtLink :to="`/students/${student.id}`" class="btn btn-info btn-sm mx-2">Edit</NuxtLink>
                                <button @click="$event=> deleteStudent($event, student.id)" class="btn btn-danger btn-sm mx-2">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                  
                </table>
            </div>
            <div v-else class="text-center py-4"><b>No Data Found!</b></div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name:'Students',
    data(){
        return {
            students:{}
        }
    },
    mounted(){
        this.getStudents()
    }, 
    methods:{
        deleteStudent(event, id){

            if(confirm('Are you sure, you want to delete this?')){
                $(event).text = 'Deleting';
                axios.delete(`http://localhost:8000/api/student/${id}/delete`).then(res=>{
                    this.getStudents();
                });
            }
        },
        getStudents(){
            axios.get(`http://localhost:8000/api/students`).then(res=>{
                this.students = res.data.students;
            })
        }
    }
}
</script>