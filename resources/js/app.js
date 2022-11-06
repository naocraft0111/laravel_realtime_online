import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp, ref } from 'vue/dist/vue.esm-bundler';

createApp({
    data() {
        return {
            users: []
        }
    },
    methods: {
        getUsers() {

            axios.get('/users')
                .then(response => {

                    this.users = response.data;

                });

        }
    },
    mounted() {

        this.getUsers();

        Echo.channel('online_users')
            .listen('UserAccessed', e => {

                this.getUsers();

            });

        }
}).mount('#app');
