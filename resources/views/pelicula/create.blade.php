@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url ('/pelicula') }}" method="post" entype="multipart/form-data">
@csrf 
@include('pelicula.form'),['modo'=>'Crear']
</form>
</div>

@endsection
