@extends('layouts.app')

@section('content')

<link href="{{ asset('app/pildaf.css') }}" rel="stylesheet">    
<link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">    
<br>
<br>

<h5 align="center" style="color:red;font-size:36px"> ANDA MENDAFTAR SEBAGAI APA ? </h5>
<hR></hR>
<br>

<div class="container">

<div class="process" align="center">
   <!-- <div class="process-row"> -->
        
        <div class="process-step">
            <a href="{{ url('/renas') }}"><button type="button" class=" btn-warning btn-circle active"><i class="fa fa-user fa-3x"></i></button></a>
            <p style="color:blue">Nasabah</p>
        </div>
        <div class="process-step"></div>
        <div class="process-step">
            <a href="{{ url('/rebang') }}"><button type="button" class=" btn-primary btn-circle"><i class="fa fa-user fa-3x"></i></button></a>
            <p style="color:blue">Bank Sampah</p>
        </div>         
                <div class="process-step"></div>
        <div class="process-step">
            <a href="{{ url('/register') }}"><button type="button" class="btn-success btn-circle"><i class="fa fa-user fa-3x"></i></button></a>
            <p style="color:blue">Pengepul</p>
        </div> 
   <!-- </div> -->
    <div id="results"></div>
</div>
</div>
<br></br>
<br></br>
@endsection