import Vue from "vue";
import VueRouter from "vue-router";

const QrView = () => import("../views/QrFormView.vue");
const LoginView = () => import("../views/AuthView.vue");
const LoginForm = () => import("../components/LoginForm.vue");

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        meta: { auth: true },
        component: QrView,
        children: [
            {
                path: '/',
                component: QrView
            }
        ]
    },
    {
        path: "/login",
        name: "auth",
        component: LoginView,
        children: [
            {
                path: "/login",
                name: "auth.login",
                meta: { auth: false },
                component: LoginForm,
            },
        ],
    },
];

const router = new VueRouter({
    mode: "history",
    routes,
});

router.beforeEach((to, from, next) => {
    const needsAuth = to.matched.some((record) => record.meta.auth);
    const isLogged = window.localStorage.getItem("isLogged");

    if (!needsAuth && isLogged && to.path === "/login") {
        next("/");
    }
    if (needsAuth && !isLogged) {
        next("/login");
    } else {
        next();
    }
});

export default router;
