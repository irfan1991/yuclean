@extends('layouts.app')

@section('content')
<br>
<div class="col-md-8 col-md-offset-1">
@foreach($event as $post)

	<article >
		<font size="5"><a href="">{!!link_to_route('event.showup',$post->judul,$post->id)!!}</a></font>
	<br><br>
		<div class="row">
			<div class="col-md-8 col-md-offset-1">
			</div>
				</div>
		<img src="{{ URL::to('/') }}/images/event/{{ $post->image }}" alt="foto tidak ada" class="img-responsive pull-left" style=" width:300px; height:250px">
		
		<p class="lead col-md-8" align="justify">Deadline : {{' '.tgl_indo($post->tanggal)}}<br>
<span class="glyphicon glyphicon-pencil"></span>{{$post->comment_count}} Comments &nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>{{$post->create_at}}
</p>

		<p class="lead col-md-8" align="justify">{{ str_limit($post->konten, 400).'....'}}</p>
		<p class="text-right lead col-md-8">
			 {!!link_to_route('event.showup','Read full Artikel',$post->id)!!} 			
		</p>
	</article>
	<br>
@endforeach
<ul class="pager">
	{!! $event->render() !!}
</ul>
</div>
<br>
<div class="col-md-2"> 
@include('event.sidebar')
</div>
@endsection

