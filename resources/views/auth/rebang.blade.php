@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-info" >
                <div class="panel-heading"  >Registrasi Bank Sampah </div>
                <div class="panel-body">
                  @if ($errors->any())
             <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif  
     <form class="form-horizontal formp" role="form" method="POST" action="{{ url('/rebang') }}" enctype='multipart/form-data' file="true" style="color:none">
                        {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label" style="color:black">Nama</label>

                            <div class="col-md-6">
<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label" style="color:black">No Telepon/Hp</label>

            <div class="col-md-6">
  <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label" style="color:black">Alamat E-Mail </label>

                            <div class="col-md-6">
<input id="email" type="email" class="form-control " name="email"   value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                                                
                      
        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label" style="color:black" >Alamat</label>

                            <div class="col-md-6">
                 <textarea class = "form-control" rows = "3" name="alamat"></textarea>

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


<div class="form-group{{ $errors->has('image ') ? ' has-error' : '' }}">
        <label for="image" class="col-md-4 control-label" style="color:black">Foto</label>

                            <div class="col-md-6">
                                <input type="file" id="image" name="image" />

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label" style="color:black">Password</label>

            <div class="col-md-6">
             <input id="password" type="text" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

     <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label" style="color:black">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

 <div class="form-group{{ $errors->has('banksampah') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label" style="color:black" >Nama Bank Sampah</label>

                            <div class="col-md-6">
                <input id="banksampah" type="text" class="form-control typeahead" name="banksampah" autocomplete="off" value="{{ old('banksampah') }}" >


                                @if ($errors->has('banksampah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('banksampah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<script type="text/javascript">
    var path = "{{ route('autocompletebang') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
    </script>

<hr  align="center">
<h2 style="color:red"  align="center"><b>Dimana Anda Menjadi Bank Sampah ?</b></h2>
<br>



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

    

 <input type="hidden" name="role" value="banksampah"  />
    
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
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

//aja
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
    var cat_id3 = str2.substr(1,8);

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




         $('.formp').validate({
                errorElement: 'label', //default input error message container
                errorClass: 'help-inline', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    
                    name: {
                        required: true
                    },
                   email: {
                       // required: true,
                        email: true,
                                      },
                    alamat: {
                        required: true
                    },
                    rt: {
                        required: true
                    },
                    rw: {
                        required: true
                    },
                     kelurahan: {
                        required: true
                    },
                     banksampah: {
                        required: true
                    },
                     pengepul: {
                        required: true
                    },
                     propinsi: {
                        required: true
                    },
                     kabupaten: {
                        required: true
                    },
                     kecamatan: {
                        required: true
                    },

                    username: {
                        required: true,
                        number : true,
                        min : 11
                    },

                    password: {
                        
                        maxlength:16,
                        minlength:6,
                        required: true,
                                                   
                    },
                    password_confirmation: {
                        equalTo: "#password"
                    },
                image: {
                        image: true,
                        required: true,
                    },
                    tnc: {
                        required: true
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    
                    tnc: {
                        required: "Please accept TNC first."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   

                },

                       highlight: function (element) {
                    $(element).parent().addClass('error')
                },
                unhighlight: function (element) {
                    $(element).parent().removeClass('error')
                },

                success: function (label) {
                    label.closest('.control-group').removeClass('error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
                        error.addClass('help-small no-left-padding').insertAfter($('#register_tnc_error'));
                    } else if (element.closest('.input-icon').size() === 1) {
                        error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-icon'));
                    } else {
                        error.addClass('help-small no-left-padding').insertAfter(element);
                    }
                },

                submitHandler: function (form) {
                    form.submit();
                }
            });


</script>


@endsection


