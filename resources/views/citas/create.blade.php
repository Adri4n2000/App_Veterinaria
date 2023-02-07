@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/citas') }}" method="post" >
@csrf  
@include('citas.form', ['modo'=>'Crear']);
</form>
</div>
@endsection