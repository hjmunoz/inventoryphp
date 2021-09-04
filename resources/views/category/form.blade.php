@extends('layout')
@section('title', $category->id ? 'Update Category' : 'New Category')
@section('header', $category->id ? 'Update Category' : 'New Category')
@section('content')

<form action="{{route('category.save')}}" method="post">
@csrf
<input type="hidden" name="id" value="{{$category->id}}">
<div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="{{@old('name') ? @old('name') : $category->name}}">
    </div>
    @error('name')
        <p class="text-danger">
            {{$message}}
        </p>
    @enderror
  </div>
  <div class="row mb-3">
    <div class="col-sm-9"></div>
    <div class="col-sm-3">
        <a href="/categories" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
</form>


@endsection
