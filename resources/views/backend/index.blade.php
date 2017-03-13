@extends('layouts.app')

@section('content')

<div class="container">
	<div>
		<br><br>
	</div>
	<div>
		<h1>Panel administrativo</h1>
	</div>
	<div>
		<br><br>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-primary">
				<a class='whole-div-link' href={{ url('/ciudad') }}></a>
				<div class="panel-heading">
					<h3 class="panel-title">Paises y ciudades</h3>
				</div>
				<div class="panel-body">
					Panel content
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<a class='whole-div-link' href={{ url('/instituto') }}></a>
				<div class="panel-heading">
					<h3 class="panel-title">Institutos</h3>
				</div>
				<div class="panel-body">
					Panel content
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<a class='whole-div-link' href={{ url('/programa') }}></a>
				<div class="panel-heading">
					<h3 class="panel-title">Programas y cursos</h3>
				</div>
				<div class="panel-body">
					Panel content
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-primary">
				<a class='whole-div-link' href={{ url('/promo') }}></a>
				<div class="panel-heading">
					<h3 class="panel-title">Promociones</h3>
				</div>
				<div class="panel-body">
					Panel content
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<a class='whole-div-link' href={{ url('/testimonio') }}></a>
				<div class="panel-heading">
					<h3 class="panel-title">Testimonios</h3>
				</div>
				<div class="panel-body">
					Panel content
				</div>
			</div>
		</div>
	</div>
	
</div>

@endsection
