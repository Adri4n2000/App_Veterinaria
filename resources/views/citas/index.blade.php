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



<a href="{{url('/citas/create')}}" class="btn btn-success">Registrar nueva cita</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Fecha de la cita</th>
            <th>Hora de la cita</th>
            <th>Mascota</th>

            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($citas as $cita)
        <tr>
            <td>{{$cita->id}}</td>
            <td>{{$cita->FechaCita}}</td>
            <td>{{$cita->HoraCita}}</td>
            <td>{{$cita->Mascota}}</td>
            <td>
                
            <a href="{{url('/citas/'.$cita->id.'/edit')}}" class="btn btn-warning">
                Editar
            </a>
            |
                
            <form action="{{url('/citas/'.$cita->id)}}" class="d-inline" method="post">
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
{!! $citas->links()!!}
</div>
@endsection
