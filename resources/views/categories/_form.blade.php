 <div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
  {!! Form::label('title', 'Title') !!}
  {!! Form::text('title', null, ['class'=>'form-control']) !!}
  {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('parent_id') ? 'has-error' : '' !!}">
  {!! Form::label('parent_id', 'Parent') !!}
  {!! Form::select('parent_id', [''=>'']+App\Kategori::lists('title','id')->all(), null, ['class'=>'form-control']) !!}
  {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
</div>

{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>' btn-primary']) !!}
 | <a href="{{ URL::route('categories.index') }}" style="color:black " >Batal</a>
                            
