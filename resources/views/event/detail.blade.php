@extends('layouts.app')

@section('content')
<br>
<div class="col-md-8 col-md-offset-1">
	<article >
		<font size="5">{{$event->judul}}</font>
	<br><br>
		<div class="row">
			<div class="col-md-8 col-md-offset-1">
			</div>
			<div class="col-md-8 col-md-offset-1">Deadline : {{' '.tgl_indo($event->tanggal)}} &nbsp;&nbsp;
<span class="glyphicon glyphicon-pencil"></span>{{$event->comment_count}} Comments &nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>{{tgl_indo($event->created_at)}}
</p>
</div></div>
				<hr>
		<img src="{{ URL::to('/') }}/images/event/{{ $event->image }}" alt="foto tidak ada" class="img-responsive pull-left" style=" width:300px; height:250px">
		<p class="lead col-md-8" align="justify">{{$event->konten}}</p>
		<hr>
	</article>
<ul class="pager">
<li class="previous  col-md-8" align="justify"><a href="{{url('/event/list')}} " > &larr; Back to List</a></li>
</ul>

<br>
@include('event.comment')

<br>
<div class="col-md-2"> 
@include('event.sidebar')
</div>


@endsection
