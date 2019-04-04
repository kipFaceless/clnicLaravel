<?php

namespace App\Http\Controllers;

use App\Models\Advice;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Physician;
use App\Models\Appointment;
class AdviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patient $id)
    {
        $year =date('Y');
        $patient=Patient::find($id);
     dd($patient);
        $physicians = Physician::pluck('name', 'id');
        return view('advices.advice', compact('year','patient', 'physicians'));
    }

    
    public function getadvice(Patient $id)
    {
        $year =date('Y');
        $patient=Patient::find($id);
     //dd($patient);
        $physicians = Physician::pluck('name', 'id');
        return view('advices.advice', compact('year','patient', 'physicians'));
    }

    /**
     ==============================================================================================
     */
    public function store(Request $request)
    {
       // $store= $request->all();
       //dd($store);
        $save=Advice::create($request->except(['_token']));

        return view('advices.print', compact('save'));
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advice  $advice
     * @return \Illuminate\Http\Response
     */
    public function show(Advice $advice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advice  $advice
     * @return \Illuminate\Http\Response
     */
    public function edit(Advice $advice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advice  $advice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advice $advice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advice  $advice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advice $advice)
    {
        //
    }
}
