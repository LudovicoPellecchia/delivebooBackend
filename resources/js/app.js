import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**',
])


import { createApp } from "vue";

import Navbar from './components/Navbar/Navbar.vue';
import Footer from './components/Footer.vue';
import ProgressBar from './components/Registration/ProgressBar.vue';
import RegisterForm from './components/Registration/RegisterForm.vue';

const app = createApp({});

app.component("nav-bar", Navbar);
app.component("footer-vue" , Footer);
app.component("progress-bar" , ProgressBar);
app.component("register-form" , RegisterForm);

const mountedApp = app.mount("#app");



