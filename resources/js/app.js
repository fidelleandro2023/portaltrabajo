// Views 

import Navbar from "./components/global/Navbar.vue";
import Footer from "./components/global/Footer.vue";
import Sidebar from "./components/global/Sidebar.vue";
import Container from "./components/Container.vue";
import Login from "./components/auth/Login.vue";
import Register from "./components/auth/Register.vue";
import PasswordReset from "./components/auth/PasswordReset.vue";
import PasswordUpdate from "./components/auth/PasswordUpdate.vue";

//require("./bootstrap");
window.Vue =
    import ('vue').default;
//import Vue from "vue";
//Vue.config.productionTip = false

// const app = new Vue({
//     el: "#app",
//     components: {
//         Container,
//         Navbar,
//         Sidebar,
//         Footer,
//         Login,
//         Register,
//         PasswordReset,
//         PasswordUpdate,
//     }
// });

import { createApp } from 'vue'
var app = createApp({});

app.component('Container',
    'Navbar',
    'Sidebar',
    'Footer',
    'Login',
    'Register',
    'PasswordReset',
    'PasswordUpdate'
);

//require('./bootstrap.js');

// createInertiaApp({
//     title: (title) => `${title} - ${appName}`,
//     resolve: (name) => require(`./Pages/${name}.vue`),
//     setup({ el, app, props, plugin }) {
//         return createApp({ render: () => h(app, props) })
//             .use(plugin)
//             .use(CKEditor)
//             .component('InertiaHead', Head)
//             .component('InertiaLink', Link)
//             .mixin({ methods: { route } })
//             .mount(el);
//     },
// });
//export = { app };