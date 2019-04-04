<h1 class="titulo">Título da cor Indigo</h1>


@foreach($data as $paciente)

		{{$paciente->name}}<br>

@endforeach


<div class="page-break"></div>
<p>Olá Mundo!</p>

<style>
	
	.titulo{
		color: indigo;
	}
</style>




<style>
.page-break {
    page-break-after: always;
}