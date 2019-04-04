<?php

namespace App\Http\Controllers;

use App\Models\Physician;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use DB;

use App\Models\Speciality;

class PhysicianController extends Controller
{
     public function index(Request $request, Physician $physician)
    {
    //Query Scope - Global Vars in physician Model
     $name       =  $request->get('name');
     $email      =  $request->get('email');  
     $address     =  $request->get('address'); 

    $physicians = Physician::orderBy('id', 'DESC')
                            ->name($name)
                            ->email($email)
                            ->address($address)
                            ->paginate(7);

       return view('physicians.index', compact('physicians'));
    }

   //=====================================================================================
    public function create()
    {
        return view('physicians.create-edit');
    }

   //======================================================================================
    public function store(Request $request, Physician $physician)
    {

        $this->validate($request, [
             'name'=>'required|min:2|max:30', 
                            'email'=>'unique:physicians,email',
                            'speciality_id',
                            'tel',
                            'avatar', 
                            'address',
                            'avatar',
        ]);

       $store = $physician = Physician::create($request->all());

       
        if ($store) {
            return redirect()
                            ->route('physicians.index')
                            ->with('success','Médico inserido com Sucesso!');
        }else{
            return redirect()
                            ->back()
                            ->with('error','Erro ao inserir Médico!');
        }
        return redirect()->route('physicians.index');
    }

    //======================================================================================
    public function show(Physician $physician)
    {
       


        $physician_id = Physician::find($physician->id);
        $physician_name = $physician_id->name;

        $phy_id =$physician->id;

        $today = date('Y-m-d');
       
       $agenda= DB::table('appointments as ag')
                        ->join('physicians as ph', 'ag.physician_id','=', 'ph.id' )
                        ->join('patients as pa', 'ag.patient_id','=','pa.id')
                        ->select('ag.id as id','ag.patient_id as patient_id', 'pa.name as patient','ag.physician_id', 'ph.name as physician','ag.symptom as symptom', 'ag.dated_to as date')
                        ->where('ag.physician_id','=',$phy_id)
                        ->get();
                       // ->first();
                        
                        //dd($agenda);

 return view('physicians.show', compact('agenda', 'physician_name','phy_id'));





       /*$physician = Physician::find($physician->id);
       
       $patients = $physician->patients();
       dd($patients);
       foreach ($patients as $patient) {
           echo "{$patient->name}";
       }

           //*/
    }

   //========================================================================================
    public function edit(Physician $physician)

    {   
        $physician = Physician::find($physician->id);
       
      
       return view('physicians.create-edit', compact('physician'));
    }

   //=========================================================================================
    public function update(Request $request, Physician $physician)
    {
        $physician=Physician::findOrFail($physician->id);
         $this->validate($request, [
             'name'=>'required|min:2|max:30', 
                            'email'=>'required|unique:physicians,email',
                            'speciality_id',
                            'tel',
                            'avatar', 
                            'address',
                            'avatar',
                            'email' => 'required|string|email|max:191|unique:users,email,'.$physician->id,
        ]);

          $update=$physician->update($request->all());
        if ($update) {
            return redirect()
                            ->route('physicians.index')
                            ->with('success','Médico alterado com Sucesso!');
        }else{
            return redirect()
                            ->back()
                            ->with('error','Erro ao alterar Médico!');
        }
    }

    //=========================================================================================
    public function destroy(Physician $physician)
    {
        $physician = Physician::find($physician->id);
        $physician->delete();
        return redirect()->back();
    }

    public function advice( $id )
    {
        $year =date('Y');
        $patient=Patient::find($id);
     //dd($patient);
        $physicians = Physician::pluck('name', 'id');
        return view('physicians.advice', compact('year','patient', 'physicians'));
    }    

    public function advicepost(Request $request, $id )
    
    {
        $test =$request->all();
        dd($test);
        
    }
}