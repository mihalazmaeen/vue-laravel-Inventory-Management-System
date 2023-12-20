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
                                            All Products
                                        </h1>
                                    </div>

                                    <div class="text-center">
                                        <router-link
                                            class="font-weight-bold small btn btn-primary"
                                            to="/add-product"
                                            >Add Product</router-link
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
                                                    <th>Product Name</th>
                                                    <th>Product Code</th>
                                                    <th>Category</th>
                                                    <th>Photo</th>
                                                    <th>Buying Price</th>
                                                    <th>Selling Price</th>
                                                    <th>Stock</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-for="product in filtersearch"
                                                    :key="product.id"
                                                >
                                                    <td>
                                                        {{ product.product_name }}
                                                 
                                                    </td>
                                                     <td>
                                                        {{ product.product_code }}
                                                 
                                                    </td>
                                                    <td>
                                                        {{ product.category.name }}
                                                    </td>
                                                     <td>
                                                        <img
                                                            :src="
                                                                product.image
                                                            "
                                                            id="em_photo"
                                                        />
                                                    </td>
                                                    <td>
                                                        {{
                                                            product.buying_price
                                                        }}
                                                    </td>
                                                   
                                                    <td>
                                                        {{
                                                            product.buying_price
                                                        }}
                                                    </td>
                                                    <td>
                                                        {{ product.stock }}
                                                    </td>
                                                    <td>
                                                        <router-link
                                                           :to="{name:'edit-product',params:{id:product.id}}"
                                                            class="btn btn-sm btn-primary mr-2"
                                                            >Edit</router-link
                                                        >
                                                        <a
                                                            @click="
                                                                deleteProduct(
                                                                    product.id
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
        this.AllProduct();
    },
    data() {
        return {
            products: [],
            searchKey: "",
        };
    },
    computed: {
        filtersearch() {
            const searchTermLower = this.searchKey.toLowerCase();
            return this.products.filter((product) => {
                return (
                    (product.product_name &&
                        product.product_name
                            .toLowerCase()
                            .includes(searchTermLower)) ||
                    (product.product_code &&
                        product.product_code 
                            .toLowerCase()
                            .includes(searchTermLower)) 
                   
                );
            });
        },
    },

    methods: {
        AllProduct() {
            axios
                .get("/api/product/")
                .then(({ data }) => (this.products = data))
                .catch();
        },
        deleteProduct(id) {
           Notification.deleteId().then((result) => {
                if (result.isConfirmed) {
                    axios
                        .delete("/api/product/" + id)
                        .then(() => {
                            this.products = this.products.filter(
                                (product) => {
                                    return product.id != id;
                                }
                            );
                        })
                        .catch(() => {
                            this.$router.push({ name: all-product });
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
