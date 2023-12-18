import LoginComponent from "./components/auth/login.vue";
import RegisterComponent from "./components/auth/register.vue";
import ForgetPasswordComponent from "./components/auth/forgetPassword.vue";
import logoutComponent from "./components/auth/logout.vue";
import HomeComponent from "./components/home.vue";
import AddEmployeeComponent from "./components/employee/create.vue";
import AllEmployeeComponent from "./components/employee/index.vue";
import EditEmployeeComponent from "./components/employee/edit.vue";

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
];
