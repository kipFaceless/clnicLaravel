<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Physician;
use App\Models\Relationship;
use DB;
use Carbon;


class PatientController extends Controller
{
    
    public function index(Request $request)
    {

      $year = date('Y');
    //Query Scope - Global Vars in Patient Model
     $name       =  $request->get('name');
     $email      =  $request->get('email');  
     $address     =  $request->get('address'); 

    $patients = Patient::orderBy('id', 'ASC')
                            ->name($name)
                            ->email($email)
                            ->address($address)
                            ->paginate(4);
      
       return view('patients.index', compact('patients', 'year'));
    }

   //=====================================================================================
    public function create()
    {
        return view('patients.create-edit');
    }

   //======================================================================================
    public function store(Request $request, Patient $patient)
    {
         $this->validate($request, [
             'name'=>'required|min:2|max:30', 
                            'identification',
                            'identification_number',
                            'date_of_birth' => 'required|max:4',
                            'sex', 
                            'address',
                            'email',
        ]);

        $patient = Patient::create($request->all());
        if ($patient) {
            return redirect()
                            ->route('patients.index')
                            ->with('success','Paciente Inserido com Sucesso!');
        }else{
            return redirect()
                            ->back()
                            ->with('error','Erro ao Inserir novo Paciente!');
        }
        
    }

    //======================================================================================



     public function patient(Patient $patient )
    {
      $patient = Patient::find($patient);
    $patient_id = $patient->pluck('id');

       // $relationships = Relationship::pluck('name', 'id');
        $physicians = Physician::pluck('name', 'id');
        return view('appointments.create-appointment', compact('physicians', 'relationships', 'patient_id', 'patient'));


      
    }

    //======================================================================================

    public function show(Patient $patient)
    {
       $show = Patient::find($patient);

            return view('patients.show', compact('show'));
    }

   //========================================================================================
    public function edit(Patient $patient)

    {   
        $patient = Patient::find($patient->id);
       
        //return $patient;
       return view('patients.create-edit', compact('patient'));
    }

   //=========================================================================================
    public function update(Request $request, Patient $patient)
    {
         $this->validate($request, [
             'name'=>'required|min:2|max:30', 
                            'identification',
                            'identification_number',
                            'date_of_birth' => 'required|max:4',
                            'sex', 
                            'address',
                            'email',
        ]);

         $patient=Patient::findOrFail($patient->id);


          $update=$patient->update($request->all());
        if ($update) {
            return redirect()
                            ->route('patients.index')
                            ->with('success','Paciente alterado com Sucesso!');
        }else{
            return redirect()
                            ->back()
                            ->with('error','Erro ao editar Paciente!');
        }
    }

    //=========================================================================================
    public function destroy(Patient $patient)
    {
        $patient = Patient::find($patient->id);
       // dd($patient->id);
        $patient->delete();
        return redirect()->back();
    }
}
