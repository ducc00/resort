
 import { createApp } from "vue";
 import App from './App.vue';
 import  router  from './routes';
 import axios from 'axios';
 import VueAxios from 'vue-axios';
 import {store} from './store';
 createApp(App).use(router).use(VueAxios, axios).use(store)
     .mount("#app");
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 