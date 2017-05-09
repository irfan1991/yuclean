<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
  {!! Form::label('name', 'Nama') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
  {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('model') ? 'has-error' : '' !!}">
  {!! Form::label('model', 'Kerajiinan Milik') !!}
  {!! Form::text('model', null, ['class'=>'form-control']) !!}
  {!! $errors->first('model', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('weight') ? 'has-error' : '' !!}">
  {!! Form::label('weight', 'Berat (gram)') !!}
  {!! Form::number('weight', null, ['class'=>'form-control']) !!}
  {!! $errors->first('weight', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('price') ? 'has-error' : '' !!}">
  {!! Form::label('price', 'Harga') !!}
  {!! Form::number('price', null, ['class'=>'form-control']) !!}
  {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('category_lists') ? 'has-error' : '' !!}">
  {!! Form::label('category_lists', 'Kategori Kerajinan Sampah') !!}
  {{-- Simplify things, no need to implement ajax for now --}}
  {!! Form::select('category_lists[]', [''=>'']+App\Kategori::lists('title','id')->all(), null, ['class'=>'form-control js-selectize', 'multiple']) !!}

  {!! $errors->first('category_lists', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('photo') ? 'has-error' : '' !!}">
  {!! Form::label('photo', 'Photo (jpeg, png)') !!}
  {!! Form::file('photo') !!}
  {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}

  @if (isset($barang) && $barang->photo !== '')
  <div class="row">
    <div class="col-md-6">
      <p>Photo Saat Ini:</p>
      <div class="thumbnail">
        <img src="{{ url('/images/barang/' . $barang->photo) }}" class="img-rounded" alt="Tidak Ada Foto">
      </div>
    </div>
  </div>
  @endif
</div>

{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>' btn-primary']) !!}
 | <a href="{{ URL::route('barang.index') }}" style="color:black " >Batal</a>
                            