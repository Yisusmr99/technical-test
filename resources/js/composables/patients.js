import { ref } from 'vue';
import axios from "axios";
import { useRouter } from 'vue-router';

export default function usePatients(){

    const patients = ref( [] )
    const patient = ref([])
    const router = useRouter()
    const errors = ref('')

    const getPatients = async() => {
        let response = await axios.get( '/api/patients' )
        patients.value = response.data.data;
    }

    const getPatient = async (id) => {
        let response = await axios.get('/api/patients/' + id)
        patient.value = response.data.data;
    }


    const storePatient = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/patients', data)
            await router.push({name: 'patients.index'})
        } catch (e) {
            console.log(e.response.status)
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const updatePatient = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/patients/' + id, patient.value)
            await router.push({name: 'patients.index'})
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const destroyPatients = async(id) => {
        await axios.delete( '/api/patients/' + id) 
    }

    return {
        patients,
        errors,
        patient,
        getPatients,
        destroyPatients,
        storePatient,
        getPatient,
        updatePatient
    }
}