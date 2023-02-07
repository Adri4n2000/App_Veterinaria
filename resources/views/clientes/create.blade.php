@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/clientes') }}" method="post" >
@csrf  
@include('clientes.form', ['modo'=>'Crear']);
</form>
</div>
@endsection