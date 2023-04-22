@extends('layouts.app') @section('content')
<div class="container">
	<h1>Share what's on your mind!</h1>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<form method="POST" action="{{ route('post-thread') }}">
					@csrf
					<div class="card-body d-flex gap-2">
						<div class="bg-primary p-5 rounded-3 text-white" style="height: max-content">{{ Auth::user()->name[0] }}</div>
						<div class="w-100">
							<input name="heading" type="text" class="form-control" placeholder="Enter title" />
							<textarea name="content" id="" cols="30" rows="5" class="form-control" placeholder="What's on your mind?"></textarea>
						</div>
						<div>
							<button class="btn btn-primary">Send</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<hr class="mt-5 mb-3" />
		@foreach ($listOfThreads as $thread)
		<div class="col-md-12 mt-2">
			<div class="card">
				<div class="card-header">{{ $thread->heading }}</div>
				<div class="card-body">
					<a role="button" href="{{ route('view-content', ['id' => $thread->id]) }}" class="btn btn-primary">Join In</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
