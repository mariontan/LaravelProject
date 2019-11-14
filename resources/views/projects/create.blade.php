<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Create a new Projects</h1>
	<form method="POST" action="/projects">
		{{csrf_field() }}
		<div>
			<input type="text" name="title" placeholder="Project title" required value="{{ old('title') }}">
		</div>
		<div>
			<textarea name="description" placeholder="Project Description" required >{{ old('description') }}</textarea>
		</div>
		<div>
			<button type="submit">Create Project</button>
		</div>
		@if	($errors->any())
			<div class="notification">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
	</form>
</body>
</html>
