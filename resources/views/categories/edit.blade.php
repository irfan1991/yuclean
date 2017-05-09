@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="flash alert-danger">
                         @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif 
  <div class="container">
    <div class="row">
      <div class="col-md-12">
     
        <h3>Edit {{ $category->title }}</h3>
         
        {!! Form::model($category, ['route' => ['categories.update', $category], 'method' =>'patch'])!!}
          @include('categories._form', ['model' => $category])
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
