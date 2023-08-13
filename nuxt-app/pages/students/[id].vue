<template>
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header">
                <h4>Edit Student <NuxtLink to="/students" class="btn btn-primary btn-sm float-end">Students</NuxtLink></h4>
            </div>
            <div class="card-body">
                
                <div v-if="isLoading">
                    <Loading :title="isLoadingTitle" />
                </div>
                <div v-else>
                    <form @submit.prevent="saveStudent">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" v-model="student.name" class="form-control">
                        <div v-if="this.errorList.name" class="text-danger">
                            {{ this.errorList.name[0] }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="name">Course</label>
                        <input type="text" v-model="student.course" class="form-control">
                        <div v-if="this.errorList.course" class="text-danger">
                            {{ this.errorList.course[0] }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="name">Email</label>
                        <input type="email" v-model="student.email" class="form-control">
                        <div v-if="this.errorList.email" class="text-danger">
                            {{ this.errorList.email[0] }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="name">Phone</label>
                        <input type="number" v-model="student.phone" class="form-control">
                        <div v-if="this.errorList.phone" class="text-danger">
                            {{ this.errorList.phone[0] }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
 export default {
    name:'studentEdit',
    data(){
        return {
            studentId:null,
            student:{},
        isLoading: false,
        isLoadingTitle: 'Loading',
        errorList:{}
    }
    },
    mounted(){
        this.studentId = this.$route.params.id;
        this.getStudent(this.studentId);
    },
    methods:{
        getStudent(id){
            this.isLoading = true;
            axios.get(`http://localhost:8000/api/student/${id}/edit`).then(res=>{
                this.student = res.data.student;
                this.isLoading = false;
            })
        },
        saveStudent(){
            this.isLoading = true;
            this.isLoadingTitle = 'Saving'
            var myThis = this;
            axios.put(`http://localhost:8000/api/student/${this.studentId}/update`, this.student).then(res=>{
                myThis.errorList = {};
     
                this.isLoading = false;
                this.isLoadingTitle = 'Loading'
            }).catch(function(error){
                myThis.errorList = error.response.data.errors;
                myThis.isLoading = false;
            })
        }
    }
 }
</script>