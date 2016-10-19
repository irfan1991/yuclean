<!-- Recent Post -->
<div class="panel panel-default">
	<div class="panel-heading">
<h2>Latest Post</h2>		
	</div>
	<ul class="list-group">
		@foreach($recentPosts as $post)
		<li class="list-group-item">{!!link_to_route('event.showup',$post->judul,$post->id)!!}</li>
		@endforeach
	</ul>
</div>

<!-- Recent Comment -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Recent Comment</h2>
	</div>
	<ul class="list-group">
		@foreach($recentComments as $comments)
		<em><li class="list-group-item">{!!link_to_route('event.showup',$comments->comment,$comments->event_id)!!}</li></em>
		@endforeach
	</ul>
</div>
</div>