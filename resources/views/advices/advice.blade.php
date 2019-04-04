
  @extends('adminlte::page')
@section('title', 'Bem Vindo')


@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
  
    <div class="box" >
        <!--Form -->
         {!!Form::open(['class'=>'form', 'route'=>['advice.store']])!!}

      @foreach($patient as $pa)

    	<div class="box-header"></div>
    	<div class="container">
    	
    	<fieldset>
    		<legend><h1>Dados do Paciente</h1></legend>
    		<label>Nome:</label><br>
    		<input type="text"style="color: red;" name="patient_id" value="{{$pa->name}}" class="form-control" disabled="true"></span><br></h3>

        <div class="form-group col-lg-6">

          <input type="text" name="patient_id" value="{{$pa->id}}">
          
           {!!Form::label("patient", ' Paciente') !!}
          {!!Form::text('patient_id',$pa->name,array_merge(['class'=>'form-control', 'disabled'=>'true',  'id'=>'patient'])) !!}
          
          
        </div>
   		 	Idade: {{$year-$pa->date_of_birth}}<br>
   		 	 		 	

    	</fieldset>
    	</div>
    	 
    	 

    	
    	<div class="box-body">

    		
        <h3><b><div class="form-group col-lg-6">
					{!!Form::label("id", ' Médico') !!}
					{!!Form::select('physician_id', $physicians, null,['class'=>'form-control', 'placeholder'=>'Seleccione um Médico' ,'id'=>'id' ]) !!}
					
				</div></b></h3> <br><br>
        
        <div class="form-group">
        	<br><br>
        	<label>Diagnóstico</label>
            <textarea name="diagnostic" class="form-control" placeholder="Name"></textarea>  
            <!--value="{{$year}}"-->
        </div>

        <div class="form-group">
        	<label>Receita</label>
            <textarea name="recipe" class="form-control" placeholder="Name"></textarea>  
           
        </div>

        

       

      </div>
      <div class="button-group">
        <a  class="btn btn-danger" >Cancelar</a>
        <button class="btn btn-primary" type="submit">Finalizar Consulta</button>

       
      </div>
       {!!Form::close()!!}
            
          </div>
          @endforeach
</div>

 

 
@stop

    		
   

			
			


		
				


		


