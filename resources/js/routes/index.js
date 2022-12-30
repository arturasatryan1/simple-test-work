import VueRouter from 'vue-router';
import Register from '../components/Register.vue';
import Welcome from '../components/Welcome.vue';

export default new VueRouter({
    routes: [
        {
            name: 'Register',
            path: '/',
            component: Register
        },
        {
            name: 'Welcome',
            path: '/welcome',
            component: Welcome
        },
    ],
    mode: 'history'
})
