<!-- Recent Post -->
<div class="panel panel-default">
	<div class="panel-heading">
<h2>Posting Terakhir</h2>		
	</div>
	<ul class="list-group">
		@foreach($recentPosts as $post)
		<li style="max-width: 800px" class="list-group-item">{!!link_to_route('event.showup',$post->judul,$post->id)!!}</li>
		@endforeach
	</ul>
</div>

<!-- Recent Comment -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Koment Terbaru</h2>
	</div>
	<ul class="list-group">
		@foreach($recentComments as $comments)
		<em><li  style="max-width: 400px"class="list-group-item">{!!link_to_route('event.showup',str_limit($comments->comment,25),$comments->event_id)!!}</li></em>
		@endforeach
	</ul>
</div>
</div>