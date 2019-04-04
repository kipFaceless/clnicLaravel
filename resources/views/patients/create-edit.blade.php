@extends('adminlte::page')

@section('title', 'Pacientes')

@section('content_header')
    <h1>Pacientes</h1>

<ol class="breadcrumb">

    	<li><a href="{{route('patients.index')}}">Listagem de Pacientes</a></li>
    	<li><a href="{{route('appointments.index')}}">Ver agendamentos</a></li>
    	
    	
    </ol>
@stop

@section('content')
  

    		<div class="box"> 

			<div class="box-header">
				@if(isset($errors)&& count($errors)>0)
        		<div class="alert alert-danger">
          		@foreach($errors->all() as $error)
          		<span>{{$error}}</span><br>
          		@endforeach
        </div>

        @endif

			</div>


			<div class="box-body">
				

				@if(isset($patient))

				{!!Form::model($patient,['route'=>['patients.update',$patient], 'class'=>'form', 'method'=>'PUT'])!!}

				@else
				{!!Form::open(['class'=>'form', 'route'=>['patients.store']])!!}

				@endif
				

				<div class="form-group col-lg-6 md-form" >

				{!!Form::label("name", 'Nome:') !!}
				{!!Form::text('name', null,['class'=>'form-control', 'id'=>'name' ]) !!}

				</div>

				

				<div class="form-group col-md-6 md-form">

				{!!Form::label("date_of_birth", 'Ano de Nascimento:') !!}
				{!!Form::number('date_of_birth', null,['class'=>'form-control','id'=>'date_of_birth','min'=>'1920', 'size'=>'4' ]) !!}

				</div>



				
				<div class="form-group col-md-6">
					<span >Sexo:</span>
					
							<input type="radio" name="sex" value="M">M
							
					
							<input type="radio" name="sex" value="F">F
					
								
				</div>


				<div class="form-group col-md-6 md-form">

				{!!Form::label("address", 'Morada:') !!}
				{!!Form::text('address', null,['class'=>'form-control','id'=>'address' ]) !!}
				</div>

				<div class="form-group col-lg-6 md-form">
					

				<select class="form-control" name="identification">
					<option value="">Seleccione o Tipo de Documento</option>
					<option value="Bilhete">Bilhete</option>
					<option value="Passaporte">Passaporte</option>
					<option value="Cédula">Cédula</option>
					<option value="Acento">Acento</option>
					<option value="Outro">Outro</option>
				</select>
				</div>

				<div class="form-group col-lg-6 md-form">

				{!!Form::label("identification_number", 'Doc Número:') !!}
				{!!Form::text('identification_number', null,['class'=>'form-control', 'id'=>'identification_number' ]) !!}
				
				</div>
					

				


				<div class="form-group col-md-6 md-form">
				{!!Form::label("tel", 'Tel:') !!}
				{!!Form::tel('tel', null,['class'=>'form-control','id'=>'tel' ]) !!}
				

				</div>
				<div class="form-group col-md-5 md-form">

				
				{!!Form::label("email", 'E-mail:') !!}

				{!!Form::email('email', null,['class'=>'form-control','id'=>'email' ]) !!}
				
				</div>

			<br>
			<br>		
			<div class="button-group col-lg-6" >
	        <button type="submit" class="btn btn-info">Salvar</button>
	        <a href="{{route('patients.index')}}" class="btn btn-danger">Cancelar</a>
	        </div>

	        		
	        		
                {!!Form::close()!!}
			</div>
			

		</div>
		


@stop
		
