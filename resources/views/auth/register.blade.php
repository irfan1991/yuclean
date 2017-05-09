@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-success" >
                <div class="panel-heading" >Daftar Menjadi Pengepul</div>
                <div class="panel-body">
                  @if ($errors->any())
             <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif  
                  <form class="form-horizontal formp" role="form" method="POST" action="{{ url('/register') }}" enctype='multipart/form-data' file="true" style="color:none">
                        {{ csrf_field() }}
         @include('layouts._flash')
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
               <div class="input-group">
            <div class="input-group-addon">+62</div>
  <input id="username" type="text"  autocomplete="off" class="form-control" name="username" value="{{ old('username') }}">
</div>
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
                            <label for="alamat" class="col-md-4 control-label" style="color:black" >Alamat Lengkap </label>

                            <div class="col-md-6">
                 <textarea class = "form-control" rows = "3" name="alamat" id="alamat"></textarea>

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
             <input id="password" type="password" class="form-control" name="password">
             <p><label><input id="methods" type="checkbox"> Show password</label></p> <p id="eventLog">Event log</p>

<script src="{{asset('js/bootstrap-show-password.js')}}"></script>
<script>
    $(function() {
        $('#password').password().on('show.bs.password', function(e) {
            $('#eventLog').text('On show event');
            $('#methods').prop('checked', true);
        }).on('hide.bs.password', function(e) {
                    $('#eventLog').text('On hide event');
                    $('#methods').prop('checked', false);
                });
        $('#methods').click(function() {
            $('#password').password('toggle');
        });
    });
</script>


                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

     <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label" style="color:black">Konfirmasi  Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



<hr  align="center">
<h2 style="color:red"  align="center"><b>Dimana Anda Menjadi Pengepul ?</b></h2>
<br>

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

                   

<input type="hidden" name="kelurahan" value=""  />
<input type="hidden" name="banksampah" value=""  />
 <input type="hidden" name="rt"  />
    <input type="hidden" name="rw"  />
      <input type="hidden" name="role" value="pengepul"  />
        <input type="hidden" name="pengepul" value="pengepul-admin"  />
    
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn  btn-primary">
                                    <i class="glyphicon glyphicon-user"></i> Daftar
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
                    city: {
                        required: true
                    },
                    country: {
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
                        required:true
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


