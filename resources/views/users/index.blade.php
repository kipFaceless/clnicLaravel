@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários</h1>

    <ol class="breadcrumb">

    	<li><a href="">Listagem de Médicos</a></li>
    	<li><a href="">Editar</a></li>
    	<li><a href="">Novo Médico</a></li>
    	
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

    			<h5>Pesquisar Usuário</h5>
    			<div>
    				
    			</div>

				 {!!Form::open(['class'=>'form-inline', 'method'=>'GET'])!!}

                <div class="form-group col-md-3">
                {!!form::label('name','Nome')!!}
                {!!form::text('name', null,['class'=>'form-control',  'id'=>'name', ])!!}
                </div>



                <div class="form-group col-md-3">
                {!!form::label('email','Email')!!}
                {!!form::text('email', null,['class'=>'form-control',   'id'=>'email',])!!}
                </div>

                <div class="form-group ">
                {!!form::label('search','Endereço:')!!}
                {!!form::text('address', null,['class'=>'form-control',  'id'=>'search', ])!!}
              </div>
            <div class="btn-group">
                
                <button type="submit" class='btn btn-success'><i class="glyphicon glyphicon-search"></i> Buscar</button>
              
                </div>

            {!!Form::close()!!}
    			
    		</div>

    		<div class="box-body">
    			@can('isAdmin')
    		<a href="{{route('users.create')}}" class="btn btn-primary">Novo Usuário</a>
    			@endcan
    			<table class="table table-striped">
					
					<thead>
						<tr>
							<th>Nome</th>
							<th>Email</th>
							<th>Tel</th>
							<th>Endereço</th>
							<th>Status</th>
							<th colspan="3">Accões</th>
						</tr>
					</thead>


					
						@foreach($users as $user)
						<tr>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->tel}}</td>
							
							<td>{{$user->address}}</td>

							<td>
								@if($user->isOnline())
									<li class="text-success">

										Online
										
									</li>
								@else
									<li class="text-muted">

										Offline
										
									</li>
								@endif
							</td>
							<td>
								{{--<a href="{{route('users.show', $user)}}" class="btn btn-info btn-xs">Visualizar</a>--}}
								<a href="{{route('users.edit',$user)}}" class="btn btn-warning btn-xs">Editar</a>

								
								@can('isAdmin')
								<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delUser" {{$user->id}}>Eliminar</button>
								@endcan
								
								{{-- 
									
									

									<a href="{{route('users.excel', $user)}}" class="btn btn-success btn-xs">Exportar Excel</a> 

									--}}

							</td>

						</tr>
					
<div class="modal fade wow rotateIn" id="delUser" {{$user->id}} tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--Form -->

       {!!Form::open(['route'=>['users.destroy',$user->id], 'class'=>'form','method'=>'delete'])!!}
      <div class="modal-body">
        
     <h4>Deseja Realmente eliminar este Usuário?</h4>

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

{!! $users->render()!!}
    		</div>


    </div>
@stop

@push('scripts')
new WOW().init();
@endpush