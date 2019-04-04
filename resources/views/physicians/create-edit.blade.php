@extends('adminlte::page')

@section('title', 'Médicos')

@section('content_header')
    <h1>Médicos</h1>

<ol class="breadcrumb">

    	<li><a href="{{route('physicians.index')}}">Listagem de Médicos</a></li>
    	<li><a href="{{route('appointments.index')}}">Ver agendamnetos</a></li>
    	
    	
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
				

				@if(isset($physician))

				{!!Form::model($physician,['route'=>['physicians.update',$physician], 'class'=>'form', 'method'=>'PUT'])!!}

				@else
				{!!Form::open(['class'=>'form', 'route'=>['physicians.store']])!!}

				@endif
				

				<div class="form-group col-lg-6" >

				{!!Form::label("name", 'Nome:') !!}
				{!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Nome' ,'id'=>'name' ]) !!}

				</div>

				

				{{--<div class="form-group col-lg-4">

				{!!Form::label("avatar", 'Imagem:') !!}
				{!!Form::file('avatar', null,['class'=>'form-control', 'placeholder'=>'Imagem de Perfil' ,'id'=>'avatar' ]) !!}

				</div>--}}


				<div class="form-group col-lg-6">
					<label>Especialidade</label>

				<select class="form-control" name="speciality_id">
					<option value="1">Dentista</option>
					<option value="2">Odontôlogo</option>
					<option value="3">Outra</option>
				</select>
				</div>

				<div class="form-group col-lg-6">

				{!!Form::label("physician_order_number", 'Nº Ordem de Médicos') !!}
				{!!Form::text('physician_order_number', null,['class'=>'form-control', 'placeholder'=>'Nº Ordem de Médicos' ,'id'=>'physician_order_number' ]) !!}
				
				</div>
					

				<div class="form-group col-lg-6">

				{!!Form::label("address", 'Endereço:') !!}
				{!!Form::text('address', null,['class'=>'form-control', 'placeholder'=>'Morada' ,'id'=>'address' ]) !!}
				</div>


				<div class="form-group col-lg-6">
				{!!Form::label("tel", 'Tel:') !!}
				{!!Form::tel('tel', null,['class'=>'form-control', 'placeholder'=>'Telefone' ,'id'=>'tel' ]) !!}
				

				</div>
				<div class="form-group col-lg-6">

				{!!Form::label("email", 'E-mail:') !!}
				{!!Form::email('email', null,['class'=>'form-control', 'placeholder'=>'Seu E-mail' ,'id'=>'email' ]) !!}
				
				</div>

					
			<div class="button-group col-lg-6" >
	        <button type="submit" class="btn btn-info">Salvar</button>
	        <a href="{{route('physicians.index')}}" class="btn btn-danger">Cancelar</a>
	        </div>

	        		
	        		
                {!!Form::close()!!}
			</div>
			

		</div>
		


@stop
