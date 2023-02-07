@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/mascotas') }}" method="post" >
@csrf  
@include('mascotas.form', ['modo'=>'Crear']);
</form>
</div>
@endsection