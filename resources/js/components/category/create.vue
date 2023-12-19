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
                                            Add Category
                                        </h1>
                                    </div>
                                    <form
                                        class="user"
                                        @submit.prevent="AddCategory"
                                        enctype="multipart/form-data"
                                    >
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Name</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        v-model="form.name"
                                                        id="exampleInputName"
                                                        placeholder="Enter Category Name"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.name"
                                                    >
                                                        {{ errors.name[0] }}
                                                    </small>
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
                                            class="font-weight-bold small btn btn-primary"
                                            to="/all-category"
                                            >Category List</router-link
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
import Notification from "../../Helpers/Notification";



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
              
            },
            errors: {},
        };
    },
    methods: {
        AddCategory() {
            axios
                .post("api/category", this.form)
                .then(() => {
                    this.$router.push({ name: "all-category" });
                    Notification.success('Category Added successfully');
                })
                .catch((error) => (this.errors = error.response.data.errors));
        },
       
    },
};
</script>

<style type="text/css"></style>
