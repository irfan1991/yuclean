@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li class="active">Ubah Profil</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Ubah Profil</h2>
</div>
  @if ($errors->any())
             <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif  
<div class="panel-body">
{!! Form::model($user,  ['route' => ['timbang.update', $user],'method' => 'put', 'class'=>'form-horizontal', 'files' => true]) !!}
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('name', 'Nama', ['class'=>'col-md-4 control-label']) !!}
<div class="col-md-6">
{!! Form::text('name', null, ['class'=>'form-control']) !!}
{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
{!! Form::label('username', 'No.Telpn', ['class'=>'col-md-4 control-label']) !!}
<div class="col-md-6">
{!! Form::text('username', null, ['class'=>'form-control']) !!}
{!! $errors->first('username', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
{!! Form::label('alamat', 'Alamat', ['class'=>'col-md-4 control-label']) !!}
<div class="col-md-6">
{!! Form::text('alamat', null, ['class'=>'form-control']) !!}
{!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
</div>
</div>

 <div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
  {!! Form::label('image', 'Product photo (jpeg, png)',['class'=>'col-md-4 control-label']) !!}
  {!! Form::file('image') !!}
  {!! $errors->first('image', '<p class="help-block">:message</p>') !!}

  @if (isset($user) && $user->image !== '')
  <div class="row">
    <div class="col-md-6">
        <div class="thumbnail">
        <img src="{{ url('/images/user/' . $user->image) }}" class="img-rounded">
      </div>
    </div>
  </div>
  @endif
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
{!! Form::label('email', 'Email', ['class'=>'col-md-4 control-label']) !!}
<div class="col-md-6">
{!! Form::email('email', null, ['class'=>'form-control']) !!}
{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group">
<div class="col-md-6 col-md-offset-4">
{!! Form::submit('Update Profile', ['class'=>'btn btn-primary']) !!}
</div>
</div>
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection