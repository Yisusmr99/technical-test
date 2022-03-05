<template>
    <div class="row">

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">Pacientes: </h5> 
                       <template v-for="item in data" :key="item.id">
                            <span class="badge bg-primary"> {{ item.total_patient }}</span> 
                        </template> 
                    </center>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">Utimo paciente registrado: </h5>
                        <template v-for="item in data" :key="item.id">
                            <span class="badge bg-primary"> {{ item.name_patient }}</span> 
                        </template>  
                    </center>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                   <center>
                        <h5 class="card-title">Doctores: </h5>
                        <template v-for="item in data" :key="item.id">
                            <span class="badge bg-primary"> {{ item.total_doctor }}</span> 
                        </template>  
                    </center> 
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">Utimo doctor registrado: </h5>
                        <template v-for="item in data" :key="item.id">
                            <span class="badge bg-primary"> {{ item.name_doctor }}</span> 
                        </template>  
                    </center>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Nuestras sucursales
    </h2><br>
    <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://mibluemedical.com/wp-content/uploads/2021/03/El-frutal-2.jpg" class="d-block w-100" height="50" alt="">
                </div>
                <div class="carousel-item" height="50" >
                    <img src="https://mibluemedical.com/wp-content/uploads/2021/03/Majadas-Fachada.jpg" class="d-block w-100" height="50" alt="">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</template>


<script>
import useDashboard from "../../composables/dashboard"
import { onMounted } from "vue";

export default {
    setup() {
        const {  data,  getData } = useDashboard()

        onMounted(getData)

        return {
            data
        }
    }
}
</script>