<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            All Supplier
                                        </h1>
                                    </div>

                                    <div class="text-center">
                                        <router-link
                                            class="font-weight-bold small btn btn-primary"
                                            to="/add-supplier"
                                            >Add Supplier</router-link
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input
                                type="text"
                                v-model="searchKey"
                                class="form-control"
                                placeholder="Enter Search Term"
                                id="search-key"
                            />
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <!-- Simple Tables -->
                                <div class="card">
                                    <div class="table-responsive">
                                        <table
                                            class="table align-items-center table-flush"
                                        >
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Photo</th>
                                                    <th>Shop Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-for="supplier in filtersearch"
                                                    :key="supplier.id"
                                                >
                                                    <td>
                                                        {{ supplier.name }}
                                                   
                                                    </td>
                                                    <td>
                                                        {{ supplier.email }}
                                                    </td>
                                                    <td>
                                                        {{
                                                            supplier.phone
                                                        }}
                                                    </td>
                                                     <td>
                                                        {{
                                                            supplier.address
                                                        }}
                                                    </td>
                                                    <td>
                                                        <img
                                                            :src="
                                                                supplier.photo
                                                            "
                                                            id="em_photo"
                                                        />
                                                    </td>
                                                    <td>
                                                        {{
                                                            supplier.shopname
                                                        }}
                                                    </td>
                                              
                                                    <td>
                                                        <router-link
                                                           :to="{name:'edit-supplier',params:{id:supplier.id}}"
                                                            class="btn btn-sm btn-primary mr-2"
                                                            >Edit</router-link
                                                        >
                                                        <a
                                                            @click="
                                                                deleteSupplier(
                                                                    supplier.id
                                                                )
                                                            "
                                                            class="btn btn-sm btn-danger"
                                                            ><font
                                                                id="delete-text"
                                                            >
                                                                Delete
                                                            </font></a
                                                        >
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer"></div>
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
import Swal from "sweetalert2";
export default {
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "login" });
        }
        this.AllSupplier();
    },
    data() {
        return {
            suppliers: [],
            searchKey: "",
        };
    },
    computed: {
        filtersearch() {
            const searchTermLower = this.searchKey.toLowerCase();
            return this.suppliers.filter((supplier) => {
                return (
                    (supplier.name &&
                        supplier.name
                            .toLowerCase()
                            .includes(searchTermLower)) ||
                    (supplier.phone &&
                        supplier.phone
                            .toLowerCase()
                            .includes(searchTermLower)) ||
                  
                    (supplier.email &&
                        supplier.email.toLowerCase().includes(searchTermLower))
                );
            });
        },
    },

    methods: {
        AllSupplier() {
            axios
                .get("/api/supplier/")
                .then(({ data }) => (this.suppliers = data))
                .catch();
        },
        deleteSupplier(id) {
           Notification.deleteId().then((result) => {
                if (result.isConfirmed) {
                    axios
                        .delete("/api/supplier/" + id)
                        .then(() => {
                            this.suppliers = this.suppliers.filter(
                                (supplier) => {
                                    return supplier.id != id;
                                }
                            );
                        })
                        .catch(() => {
                            this.$router.push({ name: all-supplier });
                        });
                   Notification.deleteConfirm();
                }
            });
        },
    },
};
</script>

<style type="text/css">
#em_photo {
    height: 40px;
    width: 40px;
}
#search-key {
    width: 300px;
}
#delete-text {
    color: white !important;
}
</style>
