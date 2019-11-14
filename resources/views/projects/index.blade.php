<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Projects</h1>
	@foreach ($projects as $project)
		<li>
			<a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
		</li>
	@endforeach
</body>
</html>
