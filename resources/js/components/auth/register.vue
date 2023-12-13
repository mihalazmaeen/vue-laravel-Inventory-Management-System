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
                                            Register
                                        </h1>
                                    </div>
                                    <form class="user" @submit.prevent="signup">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                v-model="form.name"
                                                id="exampleInputFirstName"
                                                placeholder="Enter Full Name"
                                            />
                                        </div>

                                        <div class="form-group">
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
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input
                                                type="password"
                                                class="form-control"
                                                v-model="form.password"
                                                id="exampleInputPassword"
                                                placeholder="Password"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label>Repeat Password</label>
                                            <input
                                                type="password"
                                                class="form-control"
                                                v-model="form.password_confirmation"
                                                id="exampleInputPasswordRepeat"
                                                placeholder="Repeat Password"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <button
                                                class="btn btn-primary btn-block"
                                            >
                                                Register
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
                                    <hr />
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
        if (User.loggedIn()) {
            this.$router.push({ name: "home" });
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
