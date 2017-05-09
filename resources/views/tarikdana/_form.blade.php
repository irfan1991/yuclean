{!! Form::open(['url' => '/tarikdana', 'method'=>'post', 'class' => 'form-horizontal']) !!}

    <div class="form-group {!! $errors->has('bank_name') ? 'has-error' : '' !!}">
      {!! Form::label('bank', 'Pilih Bank yang    Anda gunakan', ['class' => 'col-md-4 control-label']) !!}
      <div class="col-md-6">
        {!! Form::select('bank', bankList(), null, ['class'=>'form-control js-selectize']) !!}
        {!! $errors->first('bank', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

 
<div class="form-group {!! $errors->has('') ? 'has-error' : '' !!}">
  {!! Form::label('No Rekening', 'No Rekening', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
  {!! Form::number('', null, ['class'=>'form-control']) !!}
    {!! $errors->first('', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {!! $errors->has('jumlah') ? 'has-error' : '' !!}">
  {!! Form::label('jumlah', 'Jumlah Transfer', ['class' => 'col-md-4 control-label']) !!}
   <div class="col-md-6">
  {!! Form::number('jumlah', null, ['class'=>'form-control']) !!}
  {!! $errors->first('jumlah', '<p class="help-block">:message</p>') !!}
  </div>
</div>
<input type="hidden" name="jenis_transaksi" value="kredit">
<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {!! Form::button('<i class="fa fa-lock"></i> Transfer Bank', array('type' => 'submit', 'class' => 'btn-primary')) !!}
        </div>
    </div>
{!! Form::close() !!}
