@extends('layouts.app')

@section('content')

<div class="container">
	 <div class="row"> 
    <div class="col-md-2">
            
    <h3>Kegiatan Bank Sampah</h3>

<div class="container">
@foreach($event as $post)
  <div class="well col-sm-10">

      <div class="media" >
      	<a class="pull-left" href="#">
        
    		<img class="media-object" style="width: 150px;height: 150px" src="{{ URL::to('/') }}/images/event/{{$post->image }}" alt="gambar tidak ada">
  		</a>
  		<div class="media-body">
    		<h4 class="media-heading">{{$post->judul}}</h4>
         
          <p style="max-width: 800px">  {{ str_limit($post->konten, 100).'....'}}</p> <p class="text-right">{!!link_to_route('event.showup','Read More',$post->id)!!}</p>

          <ul class="list-inline list-unstyled">
          <li><span><i class="glyphicon glyphicon-date"></i>{{tgl_indo($post->tanggal)}}</span></li>
            <li>|</li>
  	<li><span><i class="glyphicon glyphicon-time"></i> {{$post->created_at}}</span></li>
            <li>|</li>
            <span><i class="glyphicon glyphicon-comment"></i>{{$post->comment_count}}</span>
             <li>|</li>
            <li>
            <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
              <a href=""><i class="fa fa-facebook-square fa-2x"></i></a>
              <a href=""><i class="fa fa-twitter-square fa-2x"></i></a>
              <a href=""><i class="fa fa-google-plus-square fa-2x"></i></a>
            </li>
			</ul>

</div>

  </div>

  </div>
 @endforeach

</div>
<ul class="pager">
          {!! $event->render() !!}
        </ul>
</div>
<nav class=" nav-sidebar col-md-2 pull-right">
               @include('event.sidebar')
            </nav>
            </div>
            </div>
@endsection

