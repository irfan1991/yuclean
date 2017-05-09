
{!! Form::open(['url' => '/password/email/checkout', 'method'=>'post', 'class' => 'form-horizontal']) !!}
    <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
      {!! Form::label('email', 'Alamat Email', ['class' => 'col-md-4 control-label']) !!}
      <div class="col-md-6">
        {!! Form::email('email', session()->has('email') ? session('email') : null, ['class'=>'form-control']) !!}
        <p class="help-block">Nampaknya Anda pernah berbelanja barang kerajinan bank sampah. Klik "Kirim petunjuk" untuk meminta password baru.</p>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

  
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {!! Form::button('Kirim Petunjuk <span class="glyphicon glyphicon-chevron-right"></span>', array('type' => 'submit', 'class' => ' btn-primary btn-sm')) !!}  | <a href="{{ url('checkout/login') }}" style="color:black " >Batal</a>  </div>
        </div>
   
   
{!! Form::close() !!}
