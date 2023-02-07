
<h1>{{$modo}} Cliente</h1>

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

<label for="DocumentoIdentidad">Documento de identidad:</label>    
<input type="text" class="form-control" name="DocumentoIdentidad"
 value="{{isset($clientes->DocumentoIdentidad)?$clientes->DocumentoIdentidad:old('DocumentoIdentidad')}}" id="DocumentoIdentidad">
</div>

<div class="form-group">
<label for="Nombres">Nombres:</label>    
<input type="text" class="form-control" name="Nombres"
 value="{{isset($clientes->Nombres)?$clientes->Nombres:old('Nombres')}}" id="Nombres">
</div>

<div class="form-group">
<label for="Apellidos">Apellidos:</label>    
<input type="text" class="form-control" name="Apellidos" 
value="{{isset($clientes->Apellidos)?$clientes->Apellidos:old('Apellidos')}}" id="Apellidos">
</div>

<div class="form-group">
<label for="NumeroCelular">Celular:</label>    
<input type="text" class="form-control" name="NumeroCelular" 
value="{{isset($clientes->NumeroCelular)?$clientes->NumeroCelular:old('NumeroCelular')}}" id="NumeroCelular">
</div>

<div class="form-group">
<label for="Email">Email:</label>    
<input type="email" class="form-control" name="Email" 
value="{{isset($clientes->email)?$clientes->email:old('Email')}}" id="Email">
</div>
<br>
<input class="btn btn-success" type="submit" value="{{$modo}} datos">

<a  class="btn btn-primary" href="{{url('/clientes/')}}">Regresar</a>

<br>