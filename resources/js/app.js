import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import axios from "axios";
import { routes } from "./routes";

const app = createApp({
    el: "#app",
});

const router = createRouter({
    history: createWebHistory(),
    routes,
});

app.use(router, axios);

app.mount("#app");
