import { createWebHistory, createRouter } from "vue-router";
import HomeComponent from './components/home/HomeComponent';
import RoomsComponent from './components/rooms/RoomsComponent';
import BookComponent from './components/book/BookComponent';
const routes = [
    {
        name: 'home',
        path: '/home',
        component: HomeComponent
    },
    {
        name: 'rooms',
        path: '/rooms',
        component: RoomsComponent
    },
    {
        name: 'book',
        path: '/book',
        component: BookComponent
    },
    {
        path: '/',
        redirect: '/home'
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes,
  });
  
  export default router;