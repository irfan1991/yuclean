@extends('layouts.app')

@section('content')


<div class="container">
	 <div id="blog" class="row"> 
                
                  <div class="col-sm-2 paddingTop20 ">
           
                      <div><h2 class="add">Kegiatan Bank Sampah</h2></div>
 <br>
<div class="container">

  <div class="well col-sm-10">

      <div class="media" >
      	<a class="pull-left" href="#">
        
    		<img class="media-object" style="width: 150px;height: 150px" src="{{ URL::to('/') }}/images/event/{{$event->image }}" alt="gambar tidak ada">
  		</a>
  		<div class="media-body">
    		<h4 class="media-heading">{{$event->judul}}</h4>
         
          <p style="max-width: 800px">  {{$event->konten}}</p> <br>
          <ul class="list-inline list-unstyled">
          <li><span><i class="glyphicon glyphicon-date"></i>{{tgl_indo($event->tanggal)}}</span></li>
            <li>|</li>
  	<li><span><i class="glyphicon glyphicon-time"></i> {{$event->created_at}}</span></li>
            <li>|</li>
            <span><i class="glyphicon glyphicon-comment"></i>{{$event->comment_count}}</span>
             <li>|</li>
            <li>
            <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
            <a href="{{ SocShare::gplus()->getUrl() }}" target="_blank">Google+ ({{ SocShare::gplus()->getCount() }})</a>
              <a href=""><i class="fa fa-facebook-square fa-2x"></i></a>
              <a href=""><i class="fa fa-twitter-square fa-2x"></i></a>
              <a href=""><i class="fa fa-google-plus-square fa-2x"></i></a>
            </li>
			</ul>

</div>

  </div>

<ul class="pager">
       <li class="previous  col-md-8" align="justify"><a href="{{url('/event/list')}} " > &larr; Kembali Ke Daftara</a>
        </ul>
</div>


<div class="col-md-10 ">

@include('event.comment')
</div>
</div>
<nav class="nav-sidebar col-md-2  pull-right">
               @include('event.sidebar')
            </nav >
</div>
@endsection