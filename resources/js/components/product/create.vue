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
                                            Add Product
                                        </h1>
                                    </div>
                                    <form
                                        class="user"
                                        @submit.prevent="AddProduct"
                                        enctype="multipart/form-data"
                                    >
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Product Name</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        v-model="form.productName"
                                                        id="exampleInputFirstName"
                                                        placeholder="Enter Product Name"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.productName"
                                                    >
                                                        {{ errors.productName[0] }}
                                                    </small>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Product Code</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        v-model="form.productCode"
                                                        id="exampleInputFirstName"
                                                        placeholder="Enter Product Code"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.productCode"
                                                    >
                                                        {{ errors.productCode[0] }}
                                                    </small>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleFormControlSelect1">Product Category</label>
                                                  <VueMultiselect
                                                    v-model="form.category_id"
                                                    :options="formattedCategories"
                                                    :close-on-select="true"
                                                    :clear-on-select="false"
                                                    placeholder="Select one"
                                                    label="name"
                                                    track-by="id"
                                                    :select-label="''"
                                                />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.category_id"
                                                    >
                                                        {{ errors.category_id[0] }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Buying Price</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        v-model="form.buyingPrice"
                                                        id="exampleInputEmail"
                                                        aria-describedby="emailHelp"
                                                        placeholder="Enter Buying Price"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.buyingPrice"
                                                    >
                                                        {{ errors.buyingPrice[0] }}
                                                    </small>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Selling Price</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        v-model="form.sellingPrice"
                                                        id="exampleInputPassword"
                                                        placeholder="Enter Selling Price"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.sellingPrice"
                                                    >
                                                        {{ errors.sellingPrice[0] }}
                                                    </small>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Stock</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        v-model="form.stock"
                                                        id="exampleInputPassword"
                                                        placeholder="Enter Stock"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.stock"
                                                    >
                                                        {{ errors.stock[0] }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="exampleFormControlSelect1">Product Supplier</label>
                                                 <VueMultiselect
                                                    v-model="form.supplier_id"
                                                    :options="formattedSuppliers"
                                                    :close-on-select="true"
                                                    :clear-on-select="false"
                                                    placeholder="Select one"
                                                    label="name"
                                                    track-by="id"
                                                    :select-label="''"
                                                />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.supplier_id"
                                                    >
                                                        {{ errors.supplier_id[0] }}
                                                    </small>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Buying Date</label>
                                                    <input
                                                        type="date"
                                                        class="form-control"
                                                        v-model="form.buyingDate"
                                                        id="exampleInputPassword"
                                                        placeholder="Enter Buying Date"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.buyingDate"
                                                    >
                                                        {{ errors.buyingDate[0] }}
                                                    </small>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Product Quantity</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        v-model="form.productQuantity"
                                                        id="exampleInputPassword"
                                                        placeholder="Enter Quantity"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.stock"
                                                    >
                                                        {{ errors.stock[0] }}
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
import VueMultiselect from 'vue-multiselect';



export default {
     components: { VueMultiselect },
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "login" });
        }
        // Get Categories
         axios.get('/api/category/')
        .then(({ data }) => {
            this.categories = data;
            // Update the form data after fetching categories
            this.form.category_id = data.find(category => category.id === this.form.category_id);
        });
        // Get Suppliers 
        axios.get('/api/supplier/').then(({data})=>{
            this.suppliers = data;

            this.form.supplier_id = data.find(supplier => supplier.id === this.form.supplier_id);
        });
    },
    computed: {
    formattedCategories() {
      return this.categories.map((category) => ({
        id: category.id,
        name: category.name,
      }));
    },
    formattedSuppliers() {
      return this.suppliers.map((supplier) => ({
        id: supplier.id,
        name: supplier.name,
      }));
    },
  },

    data() {
        return {
            form: {
                productName: null,
                productCode: null,
                category_id: null,
                buyingPrice: null,
                sellingPrice: null,
                photo: null,
                stock: null,
                supplier_id: null,
                buyingDate: null,
                productQuantity: null,
            },
            errors: {},
            suppliers: [],
            categories: [],
        };
    },
    methods: {
        AddProduct() {
            this.form.category_id=this.form.category_id.id;
            this.form.supplier_id=this.form.supplier_id.id;
          
            axios
                .post("api/product", this.form)
                .then(() => {
                    this.$router.push({ name: "all-product" });
                    Notification.success('Product Added successfully');
                })
                .catch((error) => (this.errors = error.response.data.errors));
        },
        SelectedFile(event) {
            let file = event.target.files[0];
            if (file.size > 1048770) {
                 Notification.error('Image must be less than 1 MB');
            } else {
                let reader = new FileReader();
                reader.onload = (event) => {
                    this.form.photo = event.target.result;
                    
                };
                reader.readAsDataURL(file);
            }
        },
    },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
