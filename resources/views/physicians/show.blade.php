@extends('adminlte::page')

@section('title', 'Agenda de Médicos')

@section('content_header')
    <h1>Agenda Médica</h1>

    <ol class="breadcrumb">

    	<li><a href="{{route('physicians.index')}}">Listagem de Médicos</a></li>
    	<li><a href="{{route('appointments.index')}}">Ver agenda</a></li>
    	<li><a href="{{route('physicians.create')}}">Novo Médico</a></li>
    	
    </ol>
@stop

@section('content')
    

 <div class="box">

 	<div class="box-header">
 		<p>Pacientes Agendados para o Médico</p>

      
   <h3><b>{{$physician_name}}</b>   </h3>
     
 	</div>
 	<div class="box-body">
        
        <table class="table table-striped">
            <tr>
                <thead>
                    <th>Agendamento Nº</th>
                    <th>Paciente</th>
                    <th>Sintomas</th>
                    <th>Acções</th>
                </thead>
            </tr>
            <tbody>

 		@forelse($agenda as $diary)
            <tr>
                <td>{{$diary->id}}</td>
               
                  <td>{{$diary->patient}}</td>
                   <td>{{$diary->symptom}}</td>
                 

                   <td>
                    <a class="btn btn-primary btn-xs" href="{{route('get.advice', 
                    $diary->patient_id)}}">Atender Paciente</a>
                   </td>
            </tr>
            

        @empty
        <p>
            Não existem pacientes agendados
        </p>

        @endforelse 
        </tbody>
 	</table>	
 	</div>
 	
       <!-- Modal -->
<div class="modal fade" id="atender-paciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--Form -->

       <form >
      <div class="modal-body">
          
        <div class="form-group">
            <input type="text" name="name"  class="form-control" placeholder="Name">
        </div>

        <div class="form-group">
            <input type="email" name="email"  class="form-control"  placeholder="Email address">
          
        </div>

        <div class="form-group">
            <input type="password" name="password" placeholder="Password">
         </div>

        <div class="form-group">
            <textarea name="bio" class="form-control" placeholder="Your Biography">
                </textarea>
            <has-error :form="form" field="bio"></has-error>
        </div>

        <div class="form-group">
            <input type="text" name="photo" class="form-control" placeholder="Your Photo">
            
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button   type="submit" class="btn btn-primary">Create</button>

       
      </div>
       </form>
    </div>
  </div>
</div>

 </div>
@stop