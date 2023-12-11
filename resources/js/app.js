import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import { routes } from "./routes";

const app = createApp({
    el: "#app",
});

const router = createRouter({
    history: createWebHistory(),
    routes,
});

app.use(router);

app.mount("#app");
