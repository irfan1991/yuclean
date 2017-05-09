@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-info" >
                <div class="panel-heading" >Tukar Pulsa </div>
                <div class="panel-body">
                  @if ($errors->any())
             <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif  
     <form class="form-horizontal formp" role="form" method="POST" action="#" enctype='multipart/form-data' file="true" style="color:none">
                        {{ csrf_field() }}

      
<div class="form-group{{ $errors->has('operator') ? ' has-error' : '' }}">
<label for="operator" class="col-md-4 control-label" style="color:black" >Operator</label>

                            <div class="col-md-6">
<select class="form-control input-sm" name="operator" id="operator">

        <option value="indosat">Indosat</option>
         <option value="xl">XL</option>
          <option value="three">Three</option>
           <option value="tekomsel">Telkomsel</option>

</select>
                                @if ($errors->has('operator'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('operator') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


    
  <div class="form-group{{ $errors->has('notelp') ? ' has-error' : '' }}">
                            <label for="notelp" class="col-md-4 control-label" style="color:black">No Telepon/Hp</label>

            <div class="col-md-6">
         
          
  <input id="notelp" type="text" class="form-control" name="notelp"  value="{{ old('notelp') }}">

                                @if ($errors->has('notelp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notelp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

 <div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }}">
                            <label for="jumlah" class="col-md-4 control-label" style="color:black">Jumlah</label>

                            <div class="col-md-6">
<input id="jumlah" type="text" class="form-control" name="jumlah" value="{{ old('jumlah') }}" >

                                @if ($errors->has('jumlah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

  
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-user"></i> Tukar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection


