@extends('layout')
@section('content')
@section('header', 'Brands')
<div class="row">
<div class="col-sm-10"></div>
<div class="col-sm-2">
    <a href="{{route('brand.form')}}" class="btn btn-primary">Nueva Marca</a>
</div>
</div>
<br>
@if(Session::has('message'))
    <p class="alert alert-success">
        {{Session::get('message')}}
    </p>
@endif
@if(Session::has('messagedelete'))
    <p class="alert alert-danger">
        {{Session::get('messagedelete')}}
    </p>
@endif
@if(Session::has('messageupdate'))
    <p class="alert alert-warning">
        {{Session::get('messageupdate')}}
    </p>
@endif
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($brands as $brand)
            <tr>
                <td>{{$brand -> name}}</td>
                <td>
                <a href="{{route('brand.form', ['id'=>$brand->id])}}" class="btn btn-warning">Editar</a>
                    <a href="{{route('brand.delete', ['id'=>$brand->id])}}" class="btn btn-danger">Borrar</a>
                </td>
            </tr>
            @endforeach
    </tbody>
</table>
@endsection
