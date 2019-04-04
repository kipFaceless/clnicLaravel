@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>

    <ol class="breadcrumb">

    	<li><a href="">Listagem de Médicos</a></li>
    	<li><a href="">Editar</a></li>
    	<li><a href="">Novo Médico</a></li>
    	
    </ol>
@stop

@section('content')
    

 <div class="box">

 	<div class="box-header">
 		<p>Perfil</p>
 	</div>
 	<div class="box-body">

 		<div style="background-color: rgba(000,000,255,0.5); width: 300px; border-radius: 5px; color: white; padding-left: 20px;">
 			@foreach($show as $patient)
			<p><b>Nome : </b> {{ $patient->name}} </p>

			<p><b>Sexo : </b>{{ $patient->sex}}</p>
            <p><b>Data de Nascimento : </b>{{ $patient->date_of_birth}}</p>
			<p><b>Telefone : </b> {{ $patient->tel}}</p>
			<p><b>Email : </b> {{ $patient->email}}</p>
			<p><b>Telefone : </b> {{ $patient->address}}</p>

            @endforeach
			
 		</div>
 		
 	</div>
 	

 </div>
@stop