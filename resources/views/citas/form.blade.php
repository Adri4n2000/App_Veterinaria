
<h1>{{$modo}} Citas</h1>

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

<label for="FechaCita">Fecha de la cita:</label>    
<input type="date" class="form-control" name="FechaCita"
 value="{{isset($citas->FechaCita)?$citas->FechaCita:old('FechaCita')}}" id="FechaCita">
</div>

<div class="form-group">
<label for="HoraCita">Hora de la cita:</label>    
<input type="time" class="form-control" name="HoraCita"
 value="{{isset($citas->HoraCita)?$citas->HoraCita:old('HoraCita')}}" id="HoraCita">
</div>
<br>
<div class="form-group">
<label for="Mascota">Mascota:</label>    
<select name="Mascota"
value="{{isset($citas->Mascota)?$citas->Mascota:old('Mascota')}}" id="Mascota">
    <option value="Perro">Perro</option>
    <option value="Gato">Gato</option>
    <option value="Conejo">Conejo</option>
    <option value="Caballo">Caballo</option>
</select>

<br>
<br>
<input class="btn btn-success" type="submit" value="{{$modo}} datos">

<a  class="btn btn-primary" href="{{url('/citas/')}}">Regresar</a>

<br>