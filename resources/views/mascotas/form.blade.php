<h1>{{$modo}} mascotas</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
 <ul>      
    @foreach($errors->all() as $error)
       <li>{{$error}}</li> 
    @endforeach
</ul>     
    </div>
@endif

<div class="form-group">

<label for="Nombre">Nombre:</label>
<input type="text" class="form-control" name="Nombre"
value="{{isset($mascota->Nombre)?$mascota->Nombre:old('Nombre')}}" id="Nombre">
<br>

</div>

<div class="form-group">

<label for="TipoMascota">Tipo de Mascota:</label>
<select name="TipoMascota"
value="{{isset($mascota->TipoMascota)?$mascota->TipoMascota:old('TipoMascota')}}" id="TipoMascota">
    <option value="Perro">Perro</option>
    <option value="Gato">Gato</option>
    <option value="Conejo">Conejo</option>
    <option value="Caballo">Caballo</option>
</select>
<br>
</div>
<br>
<input class="btn btn-success" type="submit" value="{{$modo}} datos">

<a  class="btn btn-primary" href="{{url('/mascotas/')}}">Regresar</a>