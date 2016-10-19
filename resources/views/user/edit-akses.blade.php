@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
        
            <div class="panel panel-danger" >
                <div class="panel-heading"  >Update Data 
                    @role('nasabah') Nasabah @endrole
                      @role('banksampah') Bank Sampah @endrole
                        @role('pengepul') Pengepul @endrole
                 </div>
                        <div class="panel-body">
                          @if ($errors->any())
             <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif  
     <form class="form-horizontal formp" role="form" method="POST" action="{{ url('/settings/akses') }}" enctype='multipart/form-data' file="true" style="color:none">
                        {{ csrf_field() }}
       <input type="hidden" method="PATCH">
@role('pengepul')
<div class="form-group{{ $errors->has('propinsi') ? ' has-error' : '' }}">
<label for="propinsi" class="col-md-4 control-label" style="color:black" >Propinsi</label>

                            <div class="col-md-6">
<select class="form-control input-sm" name="propinsi" id="propinsi">
       @foreach($coba as $propinsi)
        <option value="{{$propinsi->id}}">{{$propinsi->nama}}</option>
        @endforeach
</select>
                                @if ($errors->has('propinsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('propinsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


<div class="form-group{{ $errors->has('kabupaten') ? ' has-error' : '' }}">
<label for="kabupaten" class="col-md-4 control-label" style="color:black" >Kabupaten</label>

                            <div class="col-md-6">
<select class="form-control input-sm" name="kabupaten" id="kabupaten">
    @foreach($kabu as $kabupaten)
        <option value="{{$kabupaten->id}}"></option>
    @endforeach
</select>
                                @if ($errors->has('kabupaten'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kabupaten') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<div class="form-group{{ $errors->has('kecamatan') ? ' has-error' : '' }}">
<label for="kecamatan" class="col-md-4 control-label" style="color:black" >Kecamatan</label>

                            <div class="col-md-6">
<select class="form-control input-sm" name="kecamatan" id="kecamatan">

        <option value=""></option>

</select>
                                @if ($errors->has('kecamatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kecamatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
@endrole

@role('nasabah')
<div class="form-group{{ $errors->has('propinsi') ? ' has-error' : '' }}">
<label for="propinsi" class="col-md-4 control-label" style="color:black" >Propinsi</label>

                            <div class="col-md-6">
<select class="form-control input-sm" name="propinsi" id="propinsi">
       @foreach($coba as $propinsi)
        <option value="{{$propinsi->id}}">{{$propinsi->nama}}</option>
        @endforeach
</select>
                                @if ($errors->has('propinsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('propinsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


<div class="form-group{{ $errors->has('kabupaten') ? ' has-error' : '' }}">
<label for="kabupaten" class="col-md-4 control-label" style="color:black" >Kabupaten</label>

                            <div class="col-md-6">
<select class="form-control input-sm" name="kabupaten" id="kabupaten">
    @foreach($kabu as $kabupaten)
        <option value="{{$kabupaten->id}}"></option>
    @endforeach
</select>
                                @if ($errors->has('kabupaten'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kabupaten') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<div class="form-group{{ $errors->has('kecamatan') ? ' has-error' : '' }}">
<label for="kecamatan" class="col-md-4 control-label" style="color:black" >Kecamatan</label>

                            <div class="col-md-6">
<select class="form-control input-sm" name="kecamatan" id="kecamatan">

        <option value=""></option>

</select>
                                @if ($errors->has('kecamatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kecamatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


<div class="form-group{{ $errors->has('rw') ? ' has-error' : '' }}">
<label for="rw" class="col-md-4 control-label" style="color:black" >RW</label>

                            <div class="col-md-6">
<input id="rw" type="number" class="form-control " name="rw"   value="{{ old('rw') }}">
                      @if ($errors->has('rw'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rw') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<div class="form-group{{ $errors->has('rt') ? ' has-error' : '' }}">
<label for="rt" class="col-md-4 control-label" style="color:black" >RT</label>

                            <div class="col-md-6">
<input id="rt" type="number" class="form-control " name="rt"   value="{{ old('rt') }}">

                                @if ($errors->has('rt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rt') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('kelurahan') ? ' has-error' : '' }}">
<label for="kelurahan" class="col-md-4 control-label" style="color:black" >Kelurahan</label>

                            <div class="col-md-6">
<select class="form-control input-sm" name="kelurahan" id="kelurahan">

        <option value=""></option>

</select>
                                @if ($errors->has('kelurahan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kelurahan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


    <div class="form-group{{ $errors->has('banksampah') ? ' has-error' : '' }}">
                            <label for="banksampah" class="col-md-4 control-label" style="color:black">Bank Sampah</label>

            <div class="col-md-6">
  <select class="form-control input-sm" name="banksampah" id="banksampah">
        <option value=""></option>
</select>

                                @if ($errors->has('banksampah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('banksampah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
@endrole

@role('banksampah')
<div class="form-group{{ $errors->has('propinsi') ? ' has-error' : '' }}">
<label for="propinsi" class="col-md-4 control-label" style="color:black" >Propinsi</label>

                            <div class="col-md-6">
<select class="form-control input-sm"  id="propinsi" name="propinsi" ">
       @foreach($coba as $propinsi)
        <option value="{{$propinsi->id}}">{{$propinsi->nama}}</option>
        @endforeach
</select>
                                @if ($errors->has('propinsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('propinsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



<div class="form-group{{ $errors->has('kabupaten') ? ' has-error' : '' }}">
<label for="kabupaten" class="col-md-4 control-label" style="color:black" >Kabupaten</label>

                            <div class="col-md-6">
<select class="form-control input-sm" name="kabupaten" id="kabupaten">
    @foreach($kabu as $kabupaten)
        <option value="{{$kabupaten->id}}"></option>
    @endforeach
</select>
                                @if ($errors->has('kabupaten'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kabupaten') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<div class="form-group{{ $errors->has('kecamatan') ? ' has-error' : '' }}">
<label for="kecamatan" class="col-md-4 control-label" style="color:black" >Kecamatan</label>

                            <div class="col-md-6">
<select class="form-control input-sm" name="kecamatan" id="kecamatan">

        <option value=""></option>

</select>
                                @if ($errors->has('kecamatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kecamatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



<div class="form-group{{ $errors->has('pengepul') ? ' has-error' : '' }}">
<label for="pengepul" class="col-md-4 control-label" style="color:black" >Pengepul</label>

                            <div class="col-md-6">
<select class="form-control input-sm" name="pengepul" id="pengepul">

        <option value=""></option>

</select>
                                @if ($errors->has('pengepul'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pengepul') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


<div class="form-group{{ $errors->has('kelurahan') ? ' has-error' : '' }}">
<label for="kelurahan" class="col-md-4 control-label" style="color:black" >Kelurahan</label>

                            <div class="col-md-6">
<select class="form-control input-sm" name="kelurahan" id="kelurahan">

        <option value=""></option>

</select>
                                @if ($errors->has('kelurahan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kelurahan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


<div class="form-group{{ $errors->has('rw') ? ' has-error' : '' }}">
<label for="rw" class="col-md-4 control-label" style="color:black" >RW</label>

                            <div class="col-md-6">
<input id="rw" type="number" class="form-control " name="rw"   value="{{ old('rw') }}">

</select>
                                @if ($errors->has('rw'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rw') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<div class="form-group{{ $errors->has('rt') ? ' has-error' : '' }}">
<label for="rt" class="col-md-4 control-label" style="color:black" >RT</label>

                            <div class="col-md-6">
<input id="rt" type="number" class="form-control " name="rt"   value="{{ old('rt') }}">

                                @if ($errors->has('rt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rt') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

@endrole

 <input type="hidden" name="role" value="nasabah"  />
    
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class=" btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#propinsi').on('change',function(e){
    console.log(e);
    
    var cat_id = e.target.value;

//ajax
    $.get('{{ url('register') }}/ajax-subcat?cat_id=' + cat_id , function(data){
      //  console.log(data);
//suces data
$('#kabupaten').empty();
    $.each(data, function(index, subcatObj){

$('#kabupaten').append('<option value=" '+ subcatObj.id+'">'+subcatObj.nama+'</option>');

    });
    });
    });


 $('#kabupaten').on('change',function(e){
    console.log(e);
    
    var str = e.target.value;
    var cat_id2 = str.substr(1, 4);

//ajax
    $.get('{{ url('register') }}/ajax2-subcat?cat_id2=' + cat_id2 , function(data){
      //  console.log(data);
//suces data
$('#kecamatan').empty();
    $.each(data, function(index, subcatObj1){
$('#kecamatan').append('<option value=" '+subcatObj1.id+'">'+subcatObj1.nama+'</option>');

    });
    });
    });


 $('#kecamatan').on('change',function(e){
    console.log(e);
    
    var str2 = e.target.value;
    var cat_id3 = str2.substr(1,10);

//ajax
    $.get('{{ url('register') }}/ajax3-subcat?cat_id3=' + cat_id3 , function(data){
      //  console.log(data);
//suces data
$('#kelurahan').empty();
    $.each(data, function(index, subcatObj2){
$('#kelurahan').append('<option value=" '+subcatObj2.nama+'">'+subcatObj2.nama+'</option>');

    });
    });
    });


 $('#kelurahan').on('change',function(e){
    console.log(e);
  
   var str3 = e.target.value;
    //var cat_id5 = e.target.value;
var cat_id5 = str3.substr(2, 10);
var x = $('#rt').attr('value');
  var y  = $('#rw').attr('value');
//ajax
    $.get('{{ url('register') }}/ajax5-subcat?cat_id5='+cat_id5+'&x='+x+'&y='+y , function(data){
      //  console.log(data);
//suces data
$('#banksampah').empty();
    $.each(data, function(index, subcatObj3){
$('#banksampah').append('<option value="'+subcatObj3.banksampah+'">'+subcatObj3.name+' Bank Sampah '+subcatObj3.banksampah+'</option>');

    });
    });
    });

$('#kecamatan').on('change',function(e){
    console.log(e);
    
    var str2 = e.target.value;
    var cat_id3 = str2.substr(1,8);



    $.get('{{ url('register') }}/ajax4-subcat?cat_id4=' + cat_id3 , function(data){
      //  console.log(data);
//suces data
$('#pengepul').empty();
    $.each(data, function(index, subcatObj2){
$('#pengepul').append('<option value=" '+subcatObj2.id+'">'+subcatObj2.name+'</option>');

    });

    });


    });

        

</script>


@endsection


