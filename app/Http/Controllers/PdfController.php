<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Patient;
use App\Models\Advice;

class PdfController extends Controller
{
    public function index(Patient $patient){

    	$data = Patient::all();
    	$pdf = PDF::loadView('reports.pacientes', compact('data'));
		//return $pdf->download('invoice.pdf');
		//return $pdf->setPaper('a4', 'landscape')->stream('invoice.pdf');
		return $pdf->stream('pacientes.pdf');
    } 

    public function advice(Advice $advice){

    	$data = Advice::latest()->get()->first();
    	//dd($data);
    	$pdf = PDF::loadView('reports.advices.advice',compact('data'));
		//return $pdf->download('invoice.pdf');
		//return $pdf->setPaper('a4', 'landscape')->stream('invoice.pdf');
		return $pdf->setPaper('a4')->stream('Resultado da consulta.pdf');
    }
}
