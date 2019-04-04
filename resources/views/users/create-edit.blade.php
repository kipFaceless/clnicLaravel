@extends('adminlte::page')

@section('title', 'Criando Usuário')

@section('content_header')
    <h1>Usuários</h1>
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

   	@if(isset($user))

   	{!!Form::model($user,['route'=>['users.update', $user],'class'=>'form', 'method'=>'put', 'enctype'=>'multipart/form-data' ]) !!}

   	@else 
    {!!Form::open(['class'=>'form', 'enctype'=>'multipart/form-data', 'route'=>['users.store']]) !!}
	
	@endif	
			
	<div class="form-group col-lg-6" >
		{!!Form::label('name', 'Nome:') !!}
		{!!Form::text('name', null, ["placeholder"=>"Nome Completo", "class"=>"form-control", "id"=>"name"]) !!}
		
			
	</div>

	<div class="row">

    <div class="form-group col-lg-6" >

	{!!Form::label('email', 'E-mail:') !!}
	{!!Form::email('email',null, ["class"=>"form-control", "placeholder"=>"Seu E-mail", "id"=>"email"]) !!}
		
	</div>

	<div class="form-group col-lg-6" >

		{!!Form::label('password','Password:') !!}
		{!!Form::password('password',null,["placeholder"=>"Sua Senha", "class"=>"form-control", "id"=>"password"]) !!}
		
			
	</div>

	@can('isAdmin')
									
	<div class="form-group col-lg-6">
					<label>Tipo de Usuário</label>

				<select class="form-control" name="type">
					<option value="user">Usuário</option>
					<option value="receptionist">Recepcionista</option>
					<option value="physician">Médico</option>
					<option value="patient">Paciente</option>
					<option value="guest">Visitante</option>
					<option value="admin">Administrador</option>
				</select>
	</div>

	@endcan



	</div>
		<div class="row">
	<div class="form-group col-lg-6" >

		{!!Form::label('tel','Tel:') !!}
		{!!Form::tel('tel',null,["class"=>"form-control", "id"=>"tel"] ) !!}
					
	</div>

	<div class="form-group col-lg-6" >

		{!!Form::label('address','Endereço:') !!}
		{!!Form::text('address',null,["class"=>"form-control", "id"=>"address","placeholder"=>"Sua Morada"] ) !!}
					
	</div>
	</div>


	
{{--
	<div class="form-group col-lg-6">

	
		
		<label>Imagem</label><br>
		<img src="" alt="Imagem do Perfil" width="200px">

		<input type="file" name="avatar" class="form-control">

	</div>  --}}
	
		<div class="row"></div>
		<div class="btn-group" 
		>
			
			<button type="submit" class="btn btn-success">Salvar</button>
			<a href="{{route('users.index')}}" class="btn btn-danger">Cancelar</a>
		</div>	
		

{!!Form::close() !!}
    			
    		</div>

    	
@stop


