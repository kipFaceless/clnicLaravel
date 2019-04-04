@extends('adminlte::page')

@section('title', 'Agendando Paciente')

@section('content_header')
    <h1>Dashboard</h1>
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
			@foreach($patient as $pa)	

			<h4>Agendando o Paciente:</h4>
			<h3><b>{{$pa->name}}</b></h3>

			
			</div>


			<div class="box-body">
				

				
				{!!Form::open(['class'=>'form', 'route'=>['appointments.store']])!!}

								
				<input type="hidden" name="status" value="Agendado">
				
				<div class="form-group col-lg-6">

					<input type="hidden" name="patient_id" value="{{$pa->id}}">
					
					 {!!Form::label("patient", ' Paciente') !!}
					{!!Form::text('patient_id',$pa->name,array_merge(['class'=>'form-control', 'disabled'=>'true',  'id'=>'patient'])) !!}
					
					
				</div>

				
				<div class="form-group col-lg-6">
					<label>Estado do Paciente</label>

				<select class="form-control" name="condition">
					<option value="Normal">Normal</option>
					<option value="Grave">Grave</option>
					
				</select>
				</div>

				
				
				<div class="form-group col-lg-6">
					{!!Form::label("id", ' Médico') !!}
					{!!Form::select('physician_id', $physicians, null,['class'=>'form-control', 'placeholder'=>'Seleccione um Médico' ,'id'=>'id' ]) !!}
					
				</div>

				
				<div class="form-group col-lg-6">

				{!!Form::label("weight", 'Peso') !!}
				{!!Form::text('weight', null,['class'=>'form-control', 'placeholder'=>'Peso' ,'id'=>'weight' ]) !!}
				
				</div>

				<div class="form-group col-lg-12">

				{!!Form::label("symptom", 'Sintomas') !!}
				{!!Form::textarea('symptom', null,['class'=>'form-control', 'placeholder'=>'Sintomas' ,'id'=>'symptom' ]) !!}
				
				</div>

				<div class="form-group col-lg-6">

				{!!Form::label("accompanyng", 'Acompanhante') !!}
				{!!Form::text('accompanyng', null,['class'=>'form-control', 'placeholder'=>'Acompanhante' ,'id'=>'accompanyng' ]) !!}
				
				</div>

				

				<div class="form-group col-lg-6">

				{!!Form::label("dated_to", 'Agendar para o dia') !!}
				{!!Form::date('dated_to', null,['class'=>'form-control', 'placeholder'=>'Data da Consulta' ,'id'=>'dated_to', 'min'=>'2019-02-20' ]) !!}
				
				</div>
					

				<div class="form-group col-lg-4">

				{!!Form::label("date_time", 'Hora:') !!}
				{!!Form::time('date_time', null,['class'=>'form-control', 'placeholder'=>'Hora da Consulta' ,'id'=>'date_time' ]) !!}
				</div>


				

					
			<div class="button-group col-lg-6" >
	        <button type="submit" class="btn btn-info">Salvar</button>
	        <a href="{{route('appointments.index')}}" class="btn btn-danger">Cancelar</a>
	        </div>

	        		
	        		
                {!!Form::close()!!}
			</div>
			@endforeach

		</div>
		

@push('js')
<script src="{{asset('js/jquery-3.2.0.min.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script>
	$(document).ready(function(){
		$('#patient_id').select2();
	});
</script>
@endpush
@stop
