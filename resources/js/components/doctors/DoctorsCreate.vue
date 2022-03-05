<template>
    <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
        {{ errors }}
    </div>

    <form class="space-y-6" @submit.prevent="saveDoctor">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nombres</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.name">
                </div>
            </div>

            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Apellidos</label>
                <div class="mt-1">
                    <input type="text" name="last_name" id="last_name"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.last_name">
                </div>
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Telefono</label>
                <div class="mt-1">
                    <input type="text" name="phone" id="phone"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.phone">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
                <div class="mt-1">
                    <input type="text" name="email" id="email"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.email">
                </div>
            </div>

            <div>
                <label for="age" class="block text-sm font-medium text-gray-700">Edad</label>
                <div class="mt-1">
                    <input type="text" name="age" id="age"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.age">
                </div>
            </div>

            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700">Genero</label>
                <div class="mt-1">
                    <input type="text" name="gender" id="gender"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.gender">
                </div>
            </div>

            <div>
                <label for="clinic" class="block text-sm font-medium text-gray-700">Clinica</label>
                <div class="mt-1">
                    <input type="text" name="clinic" id="clinic"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.clinic">
                </div>
            </div>

            <div>
                <label for="schedule" class="block text-sm font-medium text-gray-700">Horario</label>
                <div class="mt-1">
                    <input type="text" name="schedule" id="schedule"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.schedule">
                </div>
            </div>

        </div><br>

        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Crear
        </button>
    </form>
</template>

<script>
import { reactive } from "vue";
import useDoctors from "../../composables/doctors";

export default {
    setup() {
        const form = reactive({
            'name'         : '',
            'last_name'    : '',
            'phone'        : '',
            'email'        : '',
            'age'          : '',
            'gender'       : '',
            'clinic'       : '',
            'schedule'     : '',
        })

        const { errors, storeDoctor } = useDoctors()

        const saveDoctor = async () => {
            await storeDoctor({...form});
        }

        return {
            form,
            errors,
            saveDoctor
        }
    }
}
</script>
