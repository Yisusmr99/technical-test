import { createRouter, createWebHistory } from "vue-router";

import PatientsIndex from '../components/patients/PatientsIndex';
import PatientsCreate from '../components/patients/PatientsCreate';
import PatientsEdit from '../components/patients/PatientsEdit';

const routes = [
    {
        path: '/patients',
        name: 'patients.index',
        component: PatientsIndex
    },
    {
        path: '/patients/create',
        name: 'patients.create',
        component: PatientsCreate
    },
    {
        path: '/patients/:id/edit',
        name: 'patients.edit',
        component: PatientsEdit,
        props: true
    }
]


export default createRouter ({
    history: createWebHistory(),
    routes
});