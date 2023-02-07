@extends('layouts.app')
@section('content')
<div class="container">


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{Session::get('mensaje')}}
<button type="button" class="close" data-diswiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>

</div>
@endif



<a href="{{url('/mascotas/create')}}" class="btn btn-success">Registrar nueva mascota</a>
<br/>
<br/>

<table class="table table-light">
    <thead class="thead-light">
        <th>#</th>
        <th>Nombre</th>
        <th>Tipo de mascota</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @foreach($mascotas as $mascota)
        <tr>
            <td>{{$mascota->id}}</td>
            <td>{{$mascota->Nombre}}</td>
            <td>{{$mascota->TipoMascota}}</td>
            <td>
                
            <a href="{{url('/mascotas/'.$mascota->id.'/edit')}}" class="btn btn-warning">
                Editar
            </a>
             |

             <form action="{{url('/mascotas/'.$mascota->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}    
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" 
            value="Borrar">

            </form>

            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $mascotas->links()!!}
</div>
@endsection