import { createRouter, createWebHistory } from "vue-router";

import PatientsIndex    from '../components/patients/PatientsIndex';
import PatientsCreate   from '../components/patients/PatientsCreate';
import PatientsEdit     from '../components/patients/PatientsEdit';

import DoctorsIndex     from '../components/doctors/DoctorsIndex';
import DoctorsCreate    from '../components/doctors/DoctorsCreate';
import DoctorsEdit      from '../components/doctors/DoctorsEdit';

import DashboardIndex   from '../components/dashboard/dashboard';

const routes = [
    {
        path: '/dashboard',
        name: 'dashboard',
        component: DashboardIndex
    },
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
    },
    {
        path: '/doctors',
        name: 'doctors.index',
        component: DoctorsIndex
    },
    {
        path: '/doctors/create',
        name: 'doctors.create',
        component: DoctorsCreate
    },
    {
        path: '/doctors/:id/edit',
        name: 'doctors.edit',
        component: DoctorsEdit,
        props: true
    }
]


export default createRouter ({
    history: createWebHistory(),
    routes
});