require('./bootstrap');

// require('alpinejs');

import { createApp } from "vue";
import router from './router'
import PatientsIndex from './components/patients/PatientsIndex'

createApp({
    components: {
        PatientsIndex
    }
}).use(router).mount('#app')
