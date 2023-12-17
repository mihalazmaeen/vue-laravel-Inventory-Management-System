<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                 <div class="row">
                    <router-link to="/all-employee" class="btn btn-primary">
                        All Employee
                    </router-link>
                </div>
               
                <div class="card shadow-sm my-5">
                    
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Add Employee
                                        </h1>
                                    </div>
                                    <form class="user" @submit.prevent="signup">
                                        <div class="form-group">
                                           <div class="row">
                                                <div class="col-md-6">
                                                     <label>First Name</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        v-model="form.fname"
                                                        id="exampleInputFirstName"
                                                        placeholder="Enter First Name"
                                                    />
                                                </div>
                                                <div class="col-md-6">
                                                     <label>Last Name</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        v-model="form.lname"
                                                        id="exampleInputFirstName"
                                                        placeholder="Enter Last Name"
                                                    />
                                                    
                                                </div>
                                           </div>
                                        </div>

                                           <div class="form-group">
                                           <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email</label>
                                                    <input
                                                        type="email"
                                                        class="form-control"
                                                        v-model="form.email"
                                                        id="exampleInputEmail"
                                                        aria-describedby="emailHelp"
                                                        placeholder="Enter Email Address"
                                                    />
                                                  
                                                </div>
                                                <div class="col-md-6">
                                                     <label>Address</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        v-model="form.address"
                                                        id="exampleInputPassword"
                                                        placeholder="Enter address"
                                                    />
                                                
                                                </div>
                                           </div>
                                        </div>

                                        <div class="form-group">
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <label>Salary</label>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        v-model="form.salary"
                                                        id="exampleInputPasswordRepeat"
                                                        placeholder="Enter Salary"
                                                    />
                                                  
                                                </div>
                                                <div class="col-md-6">
                                                     <label>Joining Date</label>
                                                    <input
                                                        type="date"
                                                        class="form-control"
                                                        v-model="form.joiningDate"
                                                        id="exampleInputPassword"
                                                        placeholder="Enter Joining Date"
                                                    />
                                                  
                                                </div>
                                           </div>
                                            
                                        </div>
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-md-6">
                                                     <label>NID</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        v-model="form.nid"
                                                        id="exampleInputPasswordRepeat"
                                                        placeholder="Enter NID"
                                                    />
                                                  
                                                </div>
                                                <div class="col-md-6">
                                                     <label>Contact Number</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        v-model="form.phoneNumber"
                                                        id="exampleInputPassword"
                                                        placeholder="Enter Contact Number"
                                                    />

                                                </div>
                                                
                                           </div>
                                            
                                        </div>
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-md-6">
                                                     
                                                    <input
                                                        type="file"
                                                        class="custom-file-input"
                                                        id="customFile"
                                                    />
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                  
                                                </div>
                                                <div class="col-md-6">
                                                     <img src="form.photo" style="height:40px; width:40px;">

                                                </div>
                                                
                                           </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <button
                                                class="btn btn-primary btn-block"
                                            >
                                                Add
                                            </button>
                                        </div>
                                        <hr />
                                        <!-- <a href="index.html" class="btn btn-google btn-block">
                      <i class="fab fa-google fa-fw"></i> Register with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                    </a> -->
                                    </form>
                                  
                                    <div class="text-center">
                                        <router-link
                                            class="font-weight-bold small"
                                            to="/login"
                                            >Already have an
                                            account?</router-link
                                        >
                                    </div>
                                    <div class="text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
import axios from "axios";
import User from "../../Helpers/User";
export default {
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "login" });
        }
    },
    data() {
        return {
            form: {
                name: null,
                email: null,
                password: null,
                password_confirmation:null,
               
            },
            errors: {},
        };
    },
    methods: {
        signup() {
            axios
                .post("/api/auth/signup", this.form)
                .then((res) => {
                    User.responseAfterLogin(res);
                    this.$swal({
                        icon: "success",
                        position: "top-end",
                        title: "Registered Successfully",
                    });
                    this.$router.push({ name: "home" });
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                    this.$swal({
                        icon: "error",
                        position: "top-end",
                        title: "Invalid Credentials",
                    });
                    // Stop the execution or handle the error as needed
                    // For example, you can return here to prevent the next .then block
                    // return;
                });
        },
    },
};
</script>

<style type="text/css"></style>
