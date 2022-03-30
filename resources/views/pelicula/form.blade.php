<h1> {{$modo}} pelicula </h1>
@if(count($error)>0)

  <div class="alert alert-danger" roule="alert">
<ul>
   @foreach ($error->all()as $error)
   <li> {{$error}} <li>
   @endforeach
   <ul>

</div>

<br>
<div class="form-group" >
<label for="Imagen"> </label>
@if(isset($pelicula->Imagen))
<img  class="img-thumbnail img-fluid"  src="{{asset('storage').'/'.$pelicula->Imagen}}" width="100" alt="">
@endif
<input type="file" name="Imagen" class="form-control" value="" id="Imagen" >
<br>

<div class="form-group" >
<label for="Codigo"> Codigo </label>
<input type="text" class="form-control" name="Codigo" value="{{isset($pelicula->Codigo)?$pelicula->Codigo:''}}" id="Codigo">
<br>
</div>

<div class="form-group" >
<label for="Nombre"> Nombre </label>
<input type="text" class="form-control" name="Nombre" value="{{isset($pelicula->Nombre)?$pelicula->Nombre:''}}" id="Nombre">
<br>
</div>



<div class="form-group" >
<label for="Categoria"> Categoria </label>
<input type="text" class="form-control" name="Categoria" value="{{isset($pelicula->Categoria)?$pelicula->Categoria:''}}" id="Categoria">
<br>
</div>

<div css="form-group" >
<label for="Cantidad">  Cantidad </label>
<input type="text" class="form-control"  name="Cantidad"value="{{isset($pelicula->Cantidad)?$pelicula->Cantidad:''}}"  id="Cantidad" >
<br>
</div>

<div class="form-group" >
<label for="Precio"> Precio </label>
<input type="text" class="form-control" name="Precio"value="{{$pelicula->Precio}}" id="Precio">
<br>
</div>

<input type="submit" name="Enviar datos" >
<br>
    
<input class="btn btn-success" type="submit" value="{{$modo}} datos">}


<a class="btn btn-primary"  href="{{url('pelicula/create')}}">Regresar</a>
<br>
