@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{url('/citas/'.$citas->id)}}" method="post" >
@csrf
{{method_field('PATCH')}}

@include('citas.form',['modo'=>'Editar']);

</form>
</div>
@endsection