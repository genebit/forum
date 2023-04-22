@extends('layouts.app') @section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h2>{{ $content->heading }}</h2>
			<small
				>Published by: <b>{{ $author }}</b></small
			>
		</div>
		<div class="card-body">
			<p>{{ $content->content }}</p>
		</div>
	</div>
	<hr class="mt-5 mb-3" />
	<h3>Post a comment</h3>
	<div class="card">
		<form method="POST" action="{{ route('post-comment') }}">
			@csrf
			<input name="thread_id" type="text" class="d-none" value="{{ $content->id }}" />
			<div class="card-body d-flex gap-2">
				<div class="bg-primary p-4 rounded-3 text-white" style="height: max-content">{{ Auth::user()->name[0] }}</div>
				<div class="w-100">
					<label for="">{{ Auth::user()->name }}</label>
					<textarea name="comment" id="" cols="30" rows="3" class="form-control" placeholder="What's on your mind?"></textarea>
				</div>
				<div class="mt-4">
					<button class="btn btn-primary">Post</button>
				</div>
			</div>
		</form>
	</div>
	<hr class="mt-5 mb-3" />
	<h3>Comments</h3>
	@foreach ($comments as $comment)
	<div class="card mb-3">
		<div class="card-body d-flex gap-2">
			<div class="bg-primary p-4 rounded-3 text-white" style="height: max-content">{{ $comment["author"][0] }}</div>
			<div class="w-100">
				<label for="">{{ $comment["author"] }}</label>
				<textarea disabled name="comment" cols="30" rows="3" class="form-control" placeholder="What's on your mind?">{{ $comment["comment"] }}</textarea>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection
