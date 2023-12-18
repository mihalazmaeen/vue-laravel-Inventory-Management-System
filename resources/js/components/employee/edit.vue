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
                                            Update Employee
                                        </h1>
                                    </div>
                                    <form
                                        class="user"
                                        @submit.prevent="AddEmployee"
                                        enctype="multipart/form-data"
                                    >
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
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.fname"
                                                    >
                                                        {{ errors.fname[0] }}
                                                    </small>
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
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.lname"
                                                    >
                                                        {{ errors.lname[0] }}
                                                    </small>
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
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.email"
                                                    >
                                                        {{ errors.email[0] }}
                                                    </small>
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
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.address"
                                                    >
                                                        {{ errors.address[0] }}
                                                    </small>
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
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.salary"
                                                    >
                                                        {{ errors.salary[0] }}
                                                    </small>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Joining Date</label>
                                                    <input
                                                        type="date"
                                                        class="form-control"
                                                        v-model="
                                                            form.joiningDate
                                                        "
                                                        id="exampleInputPassword"
                                                        placeholder="Enter Joining Date"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="
                                                            errors.joiningDate
                                                        "
                                                    >
                                                        {{
                                                            errors
                                                                .joiningDate[0]
                                                        }}
                                                    </small>
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
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.nid"
                                                    >
                                                        {{ errors.nid[0] }}
                                                    </small>
                                                </div>
                                                <div class="col-md-6">
                                                    <label
                                                        >Contact Number</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        v-model="
                                                            form.phoneNumber
                                                        "
                                                        id="exampleInputPassword"
                                                        placeholder="Enter Contact Number"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="
                                                            errors.phoneNumber
                                                        "
                                                    >
                                                        {{
                                                            errors
                                                                .phoneNumber[0]
                                                        }}
                                                    </small>
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
                                                        @change="SelectedFile"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.photo"
                                                    >
                                                        {{ errors.photo[0] }}
                                                    </small>
                                                    <label
                                                        class="custom-file-label"
                                                        for="customFile"
                                                        >Choose file</label
                                                    >
                                                </div>
                                                <div class="col-md-6">
                                                    <img
                                                        :src="form.photo"
                                                        style="
                                                            height: 40px;
                                                            width: 40px;
                                                        "
                                                    />
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
                                            to="/all-employee"
                                            >Employee List</router-link
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
        let id = this.$route.params.id;
        axios
            .get("/api/employee/" + id)
            .then(({ data }) => {
                // Map the backend data to your component fields
                this.form = {
                    fname: data.fname,
                    lname: data.lname,
                    email: data.email,
                    address: data.address,
                    nid: data.nid,
                    photo: data.photo,
                    phoneNumber: data.phone_number, // Map the backend column name to your field name
                    joiningDate: data.joining_date, // Map the backend column name to your field name
                    salary: data.salary,
                };
            })
            .catch();
    },

    data() {
        return {
            form: {
                fname: null,
                lname: null,
                email: null,
                address: null,
                nid: null,
                photo: null,
                phoneNumber: null,
                joiningDate: null,
                salary: null,
            },
            errors: {},
        };
    },

    methods: {
        AddEmployee() {
            axios
                .post("api/employee", this.form)
                .then(() => {
                    this.$router.push({ name: "all-employee" });
                    Notification.success("Employee Added successfully");
                })
                .catch((error) => (this.errors = error.response.data.errors));
        },
        SelectedFile(event) {
            let file = event.target.files[0];
            if (file.size > 1048770) {
                Notification.error("Image must be less than 1 MB");
            } else {
                let reader = new FileReader();
                reader.onload = (event) => {
                    this.form.photo = event.target.result;
                    console.log(event.target.result);
                };
                reader.readAsDataURL(file);
            }
        },
    },
};
</script>

<style type="text/css"></style>
