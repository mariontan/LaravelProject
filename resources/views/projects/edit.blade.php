@extends('layout')

@section('content')

	<h1>Edit Project</h1>
	<form method="POST" action="/projects/{{ $project->id }}">
		{{ method_field("PATCH") }}
		{{csrf_field() }}
		<div>
			<input type="text" name="title" placeholder="Project title" value="{{ $project->title }}">
		</div>
		<div>
			<textarea name="description" placeholder="Project Description">{{ $project->description }}</textarea>
		</div>
		<div>
			<button type="submit">Update Project</button>
		</div>

	</form>
	<form method="POST" action="/projects/{{ $project->id }}">
		{{method_field('DELETE')}}
		{{ csrf_field() }}
		<div>
			<button type="submit">Delete Project</button>
		</div>
		
	</form>
@endsection