@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Masuk Sistem</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                          @if ($errors->any())
                         <div class="flash alert-danger">
                           @foreach($errors->all() as $error)
                           <p>{{ $error}}</p>
                           @endforeach
                         </div>
                          @endif  
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">No. Telepon</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    {!! Form::checkbox('remember')!!} Ingatkan saya atau 
                </label>
             <a class=" btn-link" href="{{ url('/password/reset') }}">Lupa password</a>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class=" btn-primary">
            <span class="glyphicon glyphicon-log-in"></span> Masuk
                </button>
                <br>
                </div>
             </div>
                            

                                   
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
