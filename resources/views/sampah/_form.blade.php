<div class="form-group {!! $errors->has('nama') ? 'has-error' : '' !!}">
  {!! Form::label('nama', 'Jenis Sampah') !!}
  {!! Form::text('nama', null, ['class'=>'form-control']) !!}
  {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('satuan') ? 'has-error' : '' !!}">
  {!! Form::label('satuan', 'Satuan') !!}
  {!! Form::text('satuan', null, ['class'=>'form-control']) !!}
  {!! $errors->first('satuan', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {!! $errors->has('harga') ? 'has-error' : '' !!}">
  {!! Form::label('harga', 'Harga') !!}
  {!! Form::number('harga', null, ['class'=>'form-control']) !!}
  {!! $errors->first('harga', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('harga') ? 'has-error' : '' !!}">
  {!! Form::label('potongan', 'Harga Potongan') !!}
  {!! Form::number('potongan', null, ['class'=>'form-control']) !!}
  {!! $errors->first('potongan', '<p class="help-block">:message</p>') !!}
</div>

<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>' btn-primary']) !!}

 <button class=" btn-primary btn-md" ><a href="{{ URL::route('sampah.index') }}"  class=" btn-primary btn-md" >Cancel</a> </button>

