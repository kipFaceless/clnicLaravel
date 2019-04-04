@extends('adminlte::page')

@section('title', 'Agendamentos')

@section('content_header')
    <h1>Agendamentos</h1>
    <ol class="breadcrumb">

    	<li><a href="{{route('physicians.index')}}">Listagem de Médicos</a></li>
    	<li><a href="{{route('patients.index')}}">Listagem de Pacientes</a></li>
    	<li><a href="">Relatório</a></li>
    	
    </ol>

@stop

@section('content')
    

    <div class="box">
			

			<div class="box-header">
					@if(session('success'))
    			<div class="alert alert-success">

    				{{ session('success') }}
    				
    			</div>

    			@endif

    			@if(session('error'))
    			<div class="alert alert-danger">

    				{{ session('error') }}
    				
    			</div>

    			@endif
				<h5>Pacientes Agendados</h5>

				{{-- {!!Form::open(['class'=>'form-inline', 'method'=>'GET'])!!}

                <div class="form-group">
                {!!form::label('name','Nome')!!}
                {!!form::text('name', null,['class'=>'form-control',  'id'=>'name', ])!!}
                </div>



                <div class="form-group">
                {!!form::label('email','Email')!!}
                {!!form::text('email', null,['class'=>'form-control',   'id'=>'email',])!!}
                </div>

                <div class="form-group">
                {!!form::label('search','Endereço:')!!}
                {!!form::text('address', null,['class'=>'form-control',  'id'=>'search', ])!!}
              </div>
            <div class="btn-group">
                
                <button type="submit" class='btn btn-success'><i class="glyphicon glyphicon-search"></i> Buscar</button>
              
                </div>

            {!!Form::close()!!}
			--}}

			</div>
			<div class="box-body">
				<div class="table-responsive">
				<table class="table table-striped">
					<a class="pull-right btn btn-primary btn-xs" href="{{route('appointments.today',$today)}}">Agendados para Hoje</a> 
					<thead>
						<tr>
							<th>Consulta Nº</th>
							<th>Paciente</th>
							<th>Sintomas</th>
							<th>Estado</th>
							<th>Data da Consulta</th>
							<th>Hora da Consulta</th>
							<th>Médico</th>
							<th>Status</th>
							<th>Opções</th>
							
						</tr>
					</thead>


					
						@foreach($appointments as $appointment)
						<tr>
							<td>{{$appointment->id}}</td>
							<td>{{$appointment->patient->name}}</td>
							<td>{{$appointment->symptom}}</td>
							<td>{{$appointment->condition}}</td>
							<td>{{$appointment->dated_to}}</td>
							<td>{{$appointment->date_time}}</td>
							<td>{{$appointment->physician->name}}</td>
							<td>{{$appointment->status}}</td>
							<td>
								<a href="{{route('appointments.edit',$appointment->id)}}">editar</a>
								<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delAppointment" {{$appointment->id}}>Eliminar</button>
							</td>
							
						</tr>
							

<div class="modal fade wow rotateIn" id="delAppointment" {{$appointment->id}} tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--Form -->

       {!!Form::open(['route'=>['appointments.destroy',$appointment->id], 'class'=>'form','method'=>'delete'])!!}
      <div class="modal-body">
        
     <h4>Deseja Realmente eliminar este agendamento?</h4>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button  type="submit" class="btn btn-success">Sim</button>
   

       
      </div>
      {!!Form::close()!!}
    </div>
  </div>
</div>
						 @endforeach
											
				</table>
				{{$appointments->render()}}
				</div>
			</div>
			</div>
		
@stop