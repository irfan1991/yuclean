<div class="form-group {!! $errors->has('parent_id') ? 'has-error' : '' !!}">
{!! Form::label('city','City',['class'=>' col-sm-1']) !!}

{!!Form::select('city', $matchedCities,null,['id'=>'citylocation'], ['class'=>'form-control']) !!}
</div>