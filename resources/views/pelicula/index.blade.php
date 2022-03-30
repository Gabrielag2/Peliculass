@extends('layouts.app')

@section('content')
<div class="container">
 
@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" route="alert">
{{ Session::get('mensaje') }}
<button type="button" class="close" data-dismiss="alert" aria-label="close">
<span aria-hidden="true">$times;</span>

</button>
</div>
@endif


<a href="{{url('pelicula/create')}}" class="btn btn-success">Registrar nueva pelicula</a>
<br/>
<br/>
  <table class="table table-light">

    <thead class="thead-light">
        <tr>
          <th >Id</th>
          <th >Imagen</th>
          <th >Código</th>
          <th >Nombre</th>
          <th>Categoría</th>
          <th >Cantidad</th>
          <th >Precio</th>
          <th >Acciones</th>
        </tr>
     </thead>
     <tbody>    
        @foreach($peliculas as $pelicula)
        <tr>
            <td>{{$pelicula->Id}}</td> 
        
            <td>
               <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$pelicula->Imagen}}"  width="100" alt="">
                {{$pelicula->Imagen }}
                </td>
               <td>{{$pelicula->Codigo}}</td>
               <td>{{$pelicula->Nombre}}</td>
               <td>{{$pelicula->Categoria}}</td>
               <td>{{$pelicula->Cantidad}}</td>
               <td>{{$pelicula->Precio}}</td>
              </td>
              <a href="{{url('/pelicula/'.$pelicula->id.'/edit')}}" class="btn btn-warning">
              Editar 
            </a>  
        <td>
         <form action="{{url('/pelicula/'.$pelicula->id) }}" class="d-inline" method="POST" class="formEliminar"> >
         @csrf
         {{method_field('DELETE')}}
         <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres eliminar?')"
          value="Borrar">
         
         </form>          
        </td>        
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection