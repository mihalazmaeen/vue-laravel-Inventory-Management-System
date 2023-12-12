import LoginComponent from "./components/auth/login.vue";
import RegisterComponent from "./components/auth/register.vue";
import ForgetPasswordComponent from "./components/auth/forgetPassword.vue";
import HomeComponent from "./components/home.vue";

export const routes = [
    { path: "/login", component: LoginComponent, name: "login" },

    { path: "/register", component: RegisterComponent, name: "register" },

    {
        path: "/forget-password",
        component: ForgetPasswordComponent,
        name: "forget-password",
    },
    { path: "/home", component: HomeComponent, name: "home" },
];
