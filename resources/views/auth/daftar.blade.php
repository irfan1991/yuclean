<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="dicoding:email" content="asisten91@gmail.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no"/>
    <title>Trashpedia Apikasi Management Bank Sampah</title>

    <!-- Fonts -->
     <link href="{{ asset('app/font-awesome.min.css') }} " rel="stylesheet" type="text/css"/>
     <link href="{{ asset('app/css.css') }} " rel="stylesheet" type="text/css"/>
 

    <!-- Styles -->
     <link href="{{ asset('app/bootstrap.css') }} " rel="stylesheet" type="text/css"/>
     
     <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/grid.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/camera.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css')}}"/>
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.bootstrap3.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/selectize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         <link href="{{ asset('css/home.css') }} " rel="stylesheet" type="text/css"/>
       <link href="{{ asset('css/map.css') }} " rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
   <!-- JavaScripts -->
    <script  src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.js') }}"></script>
<script>
  $(function() {
  $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy',
                  changeMonth: true,
                      changeYear: true});
                  });
</script>
<script src="{{asset('js/bootstrap-hover-dropdown.js')}}"></script>

   <script   src="{{ asset('js/bootstrap3-typeahead.min.js')}}" ></script>
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>   
  <script src="{{ asset('js/selectize.min.js')}}"></script>   
   <script src="{{ asset('js/app.js')}}"></script>   
   @if (Session::has('flash_barang_name'))
        @include('catalogs._barang-added2', ['barang_name' => Session::get('flash_barang_name')])
    @endif
   
    <script src="{{ asset('app/bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-validate.js')}}"></script>
    <script src="{{ asset('js/jquery-migrate-1.2.1.js ')}}"></script>
    <script src="{{ asset('js/jquery.equalheights.js')}}"></script>
 <script src="{{ asset('js/jquery.mobile.customized.min.js')}}"></script>
 <script src="{{ asset('js/camera.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.js')}}"></script>
    <!--[if (gt IE 9)|                                                  !(IE)]><!-->
      
</head>
<body >
 <style>
    /* use background coloring to contrast the html element from the body element */ 
    html { 
      height: 100%; /* forces page height to equal inner window height. */
      background:white; }
    body {
      background:white;
    }
    body1 { /* change body to body1 or vice versa for quick commenting-out. */
      min-height: 100%;
    }
    body { 
      position: absolute;
      top:0; bottom:0;
      left:0; right:0;
    }
</style>
 
<div class="container">
    <div class="row">
        <div class="col-sm-12" >
            <div class="panel panel-warning" >
                <div class="panel-heading"  >Daftar Sebagai Nasabah </div>
                <div class="panel-body">
                  @if ($errors->any())
             <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif  
     <form class="form-horizontal formp" role="form" method="POST" action="{{ url('/daftar') }}" enctype='multipart/form-data' file="true" style="color:none">
                        {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label" style="color:black">Nama</label>

                            <div class="col-md-6">
<input id="name" type="text" class="form-control" name="name"  >

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
  <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">
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
<input id="email" type="email" class="form-control " name="email" >

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
<textarea class = "form-control" rows = "3"   name="alamat" id="alamat"></textarea>

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
<h2 style="color:red"  align="center"><b>Dimana Anda Menjadi Nasabah ?</b></h2>
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



 <input type="hidden" name="role" value="nasabah"  />
    
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-md btn-primary">
                                    <i class="glyphicon glyphicon-user"></i> Register
                                </button>
                                <br>
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



<script src="{{asset('js/jquery.cookie.js')}}"></script>
<script src="{{asset('js/device.min.js')}}"></script>

<script src="{{asset('js/tmstickup.js')}}"></script>
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('js/jquery.ui.totop.js')}}"></script>

<script src="{{asset('js/jquery.unveil.js')}}"></script>
<script src="{{asset('js/jquery.simplr.smoothscroll.min.js')}}"></script>

<script src="{{asset('js/jquery.mousewheel.min.js')}}"></script>

<script src="{{asset('js/jquery.unveil.js')}}"></script>
  <script src="{{ asset('js/home.js')}}"></script>
<script src="{{asset('js/jquery.mobilemenu.js')}}"></script>
<script src="{{asset('js/superfish.js')}}"></script>


</body>
</html>
