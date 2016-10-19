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
                  {!! Form::open(['route' => 'event.store', 'class'=>'form-horizontal formp', 'file'=>'true','enctype'=>'multipart/form-data'])!!}

                        {{ csrf_field() }}

            <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                            <label for="judul" class="col-md-4 control-label" style="color:black">Judul Acara</label>
                            <div class="col-md-6">
      <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" >
                                @if ($errors->has('judul'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


<div class="form-group{{ $errors->has('konten') ? ' has-error' : '' }}">
                          <label for="konten" class="col-md-4 control-label" style="color:black">Konten Acara</label>
                            <div class="col-md-6">
   <textarea class = "form-control" rows = "5" name="konten"></textarea>

                                @if ($errors->has('konten'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('konten') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
                          <label for="konten" class="col-md-4 control-label" style="color:black">Tanggal Acara</label>
                            <div class="col-md-6">
<input id="datepicker" type="text" class="form-control" name="tanggal" value="{{ old('tanggal') }}" >
                                @if ($errors->has('tanggal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



 <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label" for="image">Upload Foto</label>
                    <div class="col-md-6">
                <input id="image" name="image" class="input-file" type="file">
                  @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
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

<script type="text/javascript">
    

         $('.formp').validate({
                errorElement: 'label', //default input error message container
                errorClass: 'help-inline', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    
                    
                image: {
                        image: true,
                        required: true,
                    },
                    tnc: {
                        required: true
                    }
                },

              
            });


</script>



@endsection
 