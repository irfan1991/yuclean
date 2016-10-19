 @if ($errors->any())
 <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif 
<div class="well">
<h4>Leave a Comment</h4>
{!! Form::open(['route'=>['event.newcom',$event->id], 'role'=>'form', 'class'=>'clearfix']) !!}
<div class="col-md-6 form-group">
{!! Form::label('name','Nama',  array('class' =>'sr-only' ,'for'=>'name' )) !!}
{!! Form::text('commenter', null, array('class' =>'form-control' ,'placeholder'=>'Nama ' ),' ')!!}
</div>
<div class="col-md-6 form-group">
{!! Form::label('email','Email',  array('class' =>'sr-only' ,'for'=>'name' )) !!}
{!! Form::text('email', null, array('class' =>'form-control' ,'placeholder'=>'Email' ),' ')!!}
</div>
<div class="col-md-12 form-group">
{!! Form::label('comment','Comment',  array('class' =>'sr-only' ,'for'=>'name' )) !!}
{!! Form::textarea('comment', null, array('class' =>'form-control' ,'placeholder'=>'Comment'))!!}
</div>
<div class="col-md-12 form-group text-right">
{!! Form::submit('Submit', array('class' =>'btn-primary'))!!}
</div>
{!! Form::close()!!}
</div>
<hr>
<ul id="comments" class="comments">
@foreach($comments as $comment)
<li class="comment">
<div class="clearfix">
	<h4 class="pull-left">{{$comment->commenter}}</h4>
	<p class="pull-right">{{tgl_indo($comment->created_at)}}</p>
</div>
	<p>
		<em>{{$comment->comment}}</em>
	</p>
</li>
@endforeach
</ul>
	</div>