<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
            
               
                <div class="card shadow-sm my-5">
                    
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            All Employee
                                        </h1>
                                    </div>
                               
                                  
                                    <div class="text-center">
                                        <router-link
                                            class="font-weight-bold small btn btn-primary"
                                            to="/add-employee"
                                            >Add Employee</router-link
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
p
<script type="text/javascript">
import axios from "axios";
import User from "../../Helpers/User";
export default {
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "login" });
        }
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
