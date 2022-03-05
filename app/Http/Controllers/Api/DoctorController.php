<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

use App\Http\Resources\DoctorResource;
use App\Http\Requests\DoctorRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DoctorsExport;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DoctorResource::collection(Doctor::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        $doctor = Doctor::create($request->validated());

        return new DoctorResource($doctor);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return new DoctorResource($doctor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {
        $doctor->update($request->validated());

        return new DoctorResource($doctor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return response()->noContent();
    }

    public function export() 
    {
        return Excel::download(new DoctorsExport, 'doctores.xlsx');
    }

    public function getData(){
        
        $ultimo_doctor = Doctor::latest('id')->first();
        $name_doctor = $ultimo_doctor->name.' '.$ultimo_doctor->last_name;

        $ultimo_patient = Patient::latest('id')->first();
        $name_patient = $ultimo_patient->name.' '.$ultimo_patient->last_name;

        $data = new \stdClass();
        $data->total_doctor = Doctor::all()->count();
        $data->total_patient = Patient::all()->count();
        $data->name_doctor = $name_doctor;
        $data->name_patient = $name_patient;

        $array = [
            $data
        ];

        return response()->json([
            'data'      => $array
        ]);
    }
}
