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



<a href="{{url('/clientes/create')}}" class="btn btn-success">Registrar nuevo cliente</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Documento de Identidad</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Celular</th>
            <th>Email</th>

            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->DocumentoIdentidad}}</td>
            <td>{{$cliente->Nombres}}</td>
            <td>{{$cliente->Apellidos}}</td>
            <td>{{$cliente->NumeroCelular}}</td>
            <td>{{$cliente->email}}</td>
            <td>
                
            <a href="{{url('/clientes/'.$cliente->id.'/edit')}}" class="btn btn-warning">
                Editar
            </a>
            |
                
            <form action="{{url('/clientes/'.$cliente->id)}}" class="d-inline" method="post">
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
{!! $clientes->links()!!}
</div>
@endsection
