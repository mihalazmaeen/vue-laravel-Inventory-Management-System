import LoginComponent from "./components/auth/login.vue";
import RegisterComponent from "./components/auth/register.vue";

export const routes = [
    { path: "/login", component: LoginComponent, name: "login" },
    { path: "/register", component: RegisterComponent, name: "register" },
];
