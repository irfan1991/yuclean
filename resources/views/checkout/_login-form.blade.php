{!! Form::open(['url' => '/checkout/login', 'method'=>'post', 'class' => 'form-horizontal']) !!}

    <div class="form-group {!! $errors->has('username') ? 'has-error' : '' !!}">
  {!! Form::label('username', 'Telepon', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    <div class="input-group">
      <div class="input-group-addon">+62</div>
      {!! Form::number('username', null, ['class'=>'form-control']) !!}
    </div>
    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
  </div>
</div>


    <div class="form-group {!! $errors->has('is_guest') ? 'has-error' : '' !!}">
      <div class="col-md-6 col-md-offset-4 radio">
        <p><label>{{ Form::radio('is_guest', 1, true) }} Saya adalah pelanggan baru</label></p>
        <p><label>{{ Form::radio('is_guest', 0) }} Saya adalah pelanggan tetap</label></p>
        {!! $errors->first('is_guest', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

    <div class="form-group {!! $errors->has('checkout_password') ? 'has-error' : '' !!}">
      {!! Form::label('checkout_password', 'Password', ['class' => 'col-md-4 control-label']) !!}
      <div class="col-md-6">
        {!! Form::password('checkout_password', ['class'=>'form-control']) !!}
        {!! $errors->first('checkout_password', '<p class="help-block">:message</p>') !!}
        <a href="{{ url('/checkout/reset')}}">Lupa kata sandi?</a>
      </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {!! Form::button('Lanjut <span class="glyphicon glyphicon-triangle-right">', array('type' => 'submit', 'class' => ' btn-primary btn-sm')) !!}
        </div>
    </div>
{!! Form::close() !!}
