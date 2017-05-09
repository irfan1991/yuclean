@extends('layouts.app')

@section('content')
<div class="container">
  @include('checkout._step')
  <div class="row">
    <div class="col-xs-8">
    
@if ($errors->any())
<div class="flash alert-danger">
                         @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif 
      <div class="panel panel-default">
          <div class="panel-heading">Masuk atau Checkout tanpa mendaftar</div>
          <div class="panel-body">
              @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif
              @include('checkout._login-form')
          </div>
      </div>
    </div>
    <div class="col-xs-4">
      @include('checkout._cart-panel')
    </div>
  </div>
</div>
@endsection
