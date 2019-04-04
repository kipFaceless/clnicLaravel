@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>

    <div class="box">
			

			<div class="box-header">
				
				 </div>
			<div class="box-body">
				
					<ul>
						@forelse($relationships as $speciality)
						
							<li>{{$relationship->name}}</li>
							
							<td colspan="3" style ="width:190px; ">

								<a href="{{route('relationships.edit',$relationship)}}" class="btn btn-warning btn-xs">Editar
								</a>

								<a href="{{route('relationships.destroy',$relationship)}}"  class="btn btn-danger btn-xs">Eliminar</a>
								
							</td>

						
						@empty
						<ul class="bg-warning" style="padding: 15px;">
							<li class="text-danger" style=" list-style: none; font-size: 20px;">Nenhum tipo de Grau de afinidade cadastrado!</li>	
						</ul>
						
						 <a href="{{route('relationships.create')}}" class="btn btn-warning">Criar Novo</a>
							
						 @endforelse
						</ul>					
				{{$relationships->render()}}
				</div>
			</div>
			</div>
		
@stop

