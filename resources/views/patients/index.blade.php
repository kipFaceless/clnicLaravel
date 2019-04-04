@extends('adminlte::page')

@section('title', 'Pacientes')

@section('content_header')
    <h1>Pacientes</h1>
    <ol class="breadcrumb">

    	<li><a href="{{(route('physicians.index'))}}">Listagem de Médicos</a></li>
    	<li><a href="{{(route('appointments.index'))}}">Ver agenda</a></li>
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
				<h5>Listagem de Pacientes</h5>

				 {!!Form::open(['class'=>'form-inline', 'method'=>'GET'])!!}

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
			</div>
			<div>
				
			<a class="btn blue" href="{{route('patients.create')}}">Novo Paciente</a><br>
			</div>
			<div class="box-body">
				<div class="table-responsive">
				<table class="table table-striped">
					
					<thead>
						<tr>
							<th>Nome</th>
							<th>Idade</th>
							<th>Sexo</th>
							<th>Tel</th>
							<th>Email</th>
							<th>Morada</th>
							<th>Accões</th>
						</tr>
					</thead>


					
						@foreach($patients as $patient)
						<tr>
							<td>{{$patient->name}}</td>
							<td>{{$year-$patient->date_of_birth }} anos</td>
							<td>{{$patient->sex}}</td>
							<td>{{$patient->tel}}</td>
							<td>{{$patient->email}}</td>
							<td>{{$patient->address}}</td>
							<td colspan="3" style ="width:190px; ">

								
								<a href="{{route('patients.edit',$patient)}}" class="btn btn-warning btn-xs">Editar
								</a>

								<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delPatient" {{$patient->id}}>Eliminar</button>

								<a href="{{route('patient-appointment', $patient->id)}}"
									class="btn btn-info btn-xs">Agendar
								</a>
								


							</td>

						</tr>
							
<div class="modal fade wow rotateIn" id="delPatient" {{$patient->id}} tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--Form -->

       {!!Form::open(['route'=>['patients.destroy',$patient->id], 'class'=>'form','method'=>'delete'])!!}
      <div class="modal-body">
        
     <h4>Deseja Realmente eliminar este Paciente?</h4>

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
				{{$patients->render()}}
				</div>
			</div>
			</div>
		
@stop

