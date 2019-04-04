@extends('adminlte::page')

@section('title', 'Médicos')

@section('content_header')
    <h1>Médicos</h1>
    <ol class="breadcrumb">

    	<li><a href="{{route('appointments.index')}}">Ver agenda</a></li>
    	<li><a href="{{route('physicians.create')}}">Novo Médico</a></li>
    	<li><a href=""></a>Relatório</li>
    	
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
				<h5>Listagem de Médicos</h5>

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
			<div class="box-body">
				<div class="table-responsive">
				<table class="table table-striped">
					
					<thead>
						<tr>
							<th>Nome</th>
							
							<th>Tel</th>
							<th>Email</th>
							<th>Endereço</th>
							<th colspan="3">Accões</th>
						</tr>
					</thead>


					
						@foreach($physicians as $physician)
						<tr>
							<td>{{$physician->name}}</td>
							{{--
								<td>{{$physician->speciality_id}}</td>
								--}}

							<td>{{$physician->tel}}</td>
							<td>{{$physician->email}}</td>
							<td>{{$physician->address}}</td>
							<td colspan="3" style ="width:190px; ">

								<a href="{{route('physicians.show', $physician)}}"
									class="btn btn-info btn-xs">Ver Agenda
								</a>

								<a href="{{route('physicians.edit',$physician)}}" class="btn btn-warning btn-xs">Editar
								</a>
								@can('isAdmin')
								<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delPhysician" {{$physician->id}}>Eliminar</button>
								@endcan
								

							</td>

						</tr>


<div class="modal fade wow rotateIn" id="delPhysician" {{$physician->id}} tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--Form -->

       {!!Form::open(['route'=>['physicians.destroy',$physician->id], 'class'=>'form','method'=>'delete'])!!}
      <div class="modal-body">
        
     <h4>Deseja Realmente eliminar este Médico?</h4>

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
				{{$physicians->render()}}
				</div>
			</div>
			</div>
		
@stop