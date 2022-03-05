import { ref } from 'vue';
import axios from "axios";

export default function useDashboard(){

    const data = ref( [] )
    const patients = ref([])

    const getData = async() => {
        let response = await axios.get( '/api/get/data/doctors' )
        data.value = response.data.data;

    }
    
    return {
        data,
        getData,
    }
}