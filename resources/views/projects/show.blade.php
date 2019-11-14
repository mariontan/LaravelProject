@extends('layout')

@section('content')
	<h1 class = "title"> {{ $project->title }}</h1>
	<div>
		{{$project -> description}}
	</div>
	<p>
		<a href="/projects/{{ $project->id }}/edit">edit</a>
	</p>
	@if ($project->tasks->count())
		<div>
			@foreach ($project->tasks as $task)
				<div>
					<form method = "POST" action="/tasks/{{ $task->id }}">
						@method('PATCH')
						@csrf
						<input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : ''}}>
						{{ $task->description }}<br>
					</form>
						
				<div>
			@endforeach
		</div>
	@endif
	<h1>New Tasks</h1>
	<form method="POST" action ="/projects/{{ $project->id }}/tasks">
		@csrf
		<textarea name = "description"></textarea>
		<button type="submit" >Add Task</button>
		@include('errors')
	</form>
	
@endsection