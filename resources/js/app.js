import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import axios from "axios";
import { routes } from "./routes";
import User from "./Helpers/User";
import Notification from "./Helpers/Notification";
import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";
import ToastPlugin from "vue-toast-notification";
import "vue-toast-notification/dist/theme-bootstrap.css";


const app = createApp({});

const router = createRouter({
    history: createWebHistory(),
    routes,
});

app.use(router);
app.use(VueSweetalert2);


// Provide the User instance in the main Vue app or a global component
app.provide("User", User);
app.provide("Notification", Notification);

app.mount("#app");
