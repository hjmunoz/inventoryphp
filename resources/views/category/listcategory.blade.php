@extends('layout')
@section('content')
@section('header', 'Category')
<div class="row">
<div class="col-sm-10"></div>
<div class="col-sm-2">
    <a href="{{route('category.form')}}" class="btn btn-primary">Nueva Categoria</a>
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
        @foreach($categories as $category)
            <tr>
                <td>{{$category -> name}}</td>
                <td>
                <a href="{{route('category.form', ['id'=>$category->id])}}" class="btn btn-warning">Editar</a>
                    <a href="{{route('category.delete', ['id'=>$category->id])}}" class="btn btn-danger">Borrar</a>
                </td>
            </tr>
            @endforeach
    </tbody>
</table>
@endsection
