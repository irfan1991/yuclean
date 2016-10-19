@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-info" >
                <div class="panel-heading"  >Input Data Event</div>
                <div class="panel-body">
                   @if ($errors->any())
             <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif  
              <br>
  {!! Form::model($event,  ['route' => ['event.update', $event],'method' => 'put', 'class'=>'form-horizontal formp', 'files' => 'true']) !!}

                        {{ csrf_field() }}

            <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                            <label for="judul" class="col-md-4 control-label" style="color:black">Judul Acara</label>
                            <div class="col-md-6">
      <input id="judul" type="text" class="form-control" name="judul" value="{{$event->judul }}" >
                                @if ($errors->has('judul'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



        <div class="form-group">
            {!!Form::label('konten','Konten Acara',array('class' => 'col-md-4 control-label' ))  !!}
            <div class="col-md-6">
              {!! Form::textarea('konten',null,array('class' => 'form-control','rows'=>'5'), '') !!}
            </div>
                 </div>

<div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
                          <label for="konten" class="col-md-4 control-label" style="color:black">Tanggal Acara</label>
                            <div class="col-md-6">
<input id="datepicker" type="text" class="form-control" name="tanggal" value="{{$event->tanggal}}" >
                                @if ($errors->has('tanggal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

@if (isset($event) && $event->image !== '')
  <div class="form-group">
        {!!Form::label('image','Gambar Acara',array('class' => 'col-md-4 control-label' ))  !!}
     <div class="col-md-6">
      <div class="thumbnail ">
        <img src="{{ url('/images/event/' . $event->image) }}" class="img-rounded">
      </div>
    </div>
  </div>
  @endif

                     
<div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
  {!! Form::label('image', '  ',array('class' => 'col-md-4 control-label' )) !!}
    <div class="col-md-6">
  {!! Form::file('image') !!}
  {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
</div>




                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">                                <button type="submit" class="btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Submit
                                </button>
                                <button class="btn-primary">
                                  <a href="{{ URL::route('event.index') }}"  class=" btn-primary btn-md" >Cancel</a>
                                </button>
                                
                                
                            </div>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
 