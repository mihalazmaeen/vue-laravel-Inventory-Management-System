import LoginComponent from "./components/auth/login.vue";
import RegisterComponent from "./components/auth/register.vue";
import ForgetPasswordComponent from "./components/auth/forgetPassword.vue";
import logoutComponent from "./components/auth/logout.vue";
import HomeComponent from "./components/home.vue";
// employee routes
import AddEmployeeComponent from "./components/employee/create.vue";
import AllEmployeeComponent from "./components/employee/index.vue";
import EditEmployeeComponent from "./components/employee/edit.vue";
// Supplier Routes
import AddSupplierComponent from "./components/supplier/create.vue";
import AllSupplierComponent from "./components/supplier/index.vue";
import EditSupplierComponent from "./components/supplier/edit.vue";
// Category Routes
import AddCategoryComponent from "./components/category/create.vue";
import AllCategoryComponent from "./components/category/index.vue";
import EditCategoryComponent from "./components/category/edit.vue";

export const routes = [
    { path: "/login", component: LoginComponent, name: "login" },

    { path: "/register", component: RegisterComponent, name: "register" },

    {
        path: "/forget-password",
        component: ForgetPasswordComponent,
        name: "forget-password",
    },
    { path: "/home", component: HomeComponent, name: "home" },
    { path: "/logout", component: logoutComponent, name: "logout" },
    {
        path: "/add-employee",
        component: AddEmployeeComponent,
        name: "add-employee",
    },
    {
        path: "/all-employee",
        component: AllEmployeeComponent,
        name: "all-employee",
    },
    {
        path: "/edit-employee/:id",
        component: EditEmployeeComponent,
        name: "edit-employee",
    },
    // SUpplier
    {
        path: "/add-supplier",
        component: AddSupplierComponent,
        name: "add-supplier",
    },
    {
        path: "/all-supplier",
        component: AllSupplierComponent,
        name: "all-supplier",
    },
    {
        path: "/edit-supplier/:id",
        component: EditSupplierComponent,
        name: "edit-supplier",
    },
    // Category
    {
        path: "/add-category",
        component: AddCategoryComponent,
        name: "add-category",
    },
    {
        path: "/all-category",
        component: AllCategoryComponent,
        name: "all-category",
    },
    {
        path: "/edit-category/:id",
        component: EditCategoryComponent,
        name: "edit-category",
    },
];
