@extends('adminlte::page')
@section('title', 'Bem Vindo')


@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
  
    <div class="box" >

    	<div class="box-header">
        
      </div>

    	<div class="box-body">

        <table class="table table-striped">
          <caption>Pacientes agendandos para hoje</caption>
          <thead>
            <tr>
              <th>Consulta Nº</th>
              <th>Paciente</th>
              <th>Médico</th>
              <th>Sintomas</th>
              <th>Situação</th>
              <th>Peso</th>
              <th>Hora</th>
            </tr>
          </thead>
          <tbody>
            @forelse($today_appointments as $todayaps)
            <tr>
              <td>{{$todayaps->id}}</td>
              <td>{{$todayaps->patient->name}}</td>
              <td>{{$todayaps->physician->name}}</td>
              <td>{{$todayaps->symptom}}</td>
              <td>{{$todayaps->condition}}</td>
              <td>{{$todayaps->weigh}}</td>
              <td>{{$todayaps->date_time}}</td>

            </tr>
            @empty 
            <h3>Não existem agendamentos para hoje</h3>
            @endforelse
          </tbody>
        </table>

             
            
       </div>
          
  </div>





       

 </div>
@stop