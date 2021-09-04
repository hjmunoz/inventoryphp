@extends('layout')
@section('content')
@section('header', 'Products')
<div class="row">
<div class="col-sm-10"></div>
<div class="col-sm-2">
    <a href="{{ route('product.form')}}" class="btn btn-primary">Nuevo Producto</a>
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
            <th>Id</th>
            <th>Name</th>
            <th>Cost</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Brand</th>
            <th>Category</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product ->id}}</td>
                <td>{{$product ->name}}</td>
                <td>{{$product ->cost}}</td>
                <td>{{$product ->price}}</td>
                <td>{{$product ->quantity}}</td>
                <td>{{$product ->brand ->name}}</td>
                <td>{{$product ->category ->name}}</td>
                <td>
                    <a href="{{route('product.form', ['id' => $product->id])}}"
                    class="btn btn-warning">Editar</a>
                    <a href="{{route('product.delete', ['id'=>$product->id])}}"
                    class="btn btn-danger">Borrar</a>
                </td>
            <tr>
                @endforeach
    </tbody>
</table>
@endsection
