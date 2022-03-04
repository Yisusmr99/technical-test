import { ref } from 'vue';
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useDoctors(){

    const doctors = ref( [] )
    const doctor = ref([])
    const router = useRouter()
    const errors = ref('')

    const getDoctors = async() => {
        let response = await axios.get( '/api/doctors' )
        doctors.value = response.data.data;
    }

    const getDoctor = async (id) => {
        let response = await axios.get('/api/doctors/' + id)
        doctor.value = response.data.data;
    }


    const storeDoctor = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/doctors', data)
            await router.push({name: 'doctors.index'})
        } catch (e) {
            console.log(e.response.status)
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const updateDoctor = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/doctors/' + id, doctor.value)
            await router.push({name: 'doctors.index'})
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const destroyDoctor = async(id) => {
        await axios.delete( '/api/doctors/' + id) 
    }

    return {
        doctors,
        errors,
        doctor,
        getDoctors,
        destroyDoctor,
        storeDoctor,
        getDoctor,
        updateDoctor
    }
}