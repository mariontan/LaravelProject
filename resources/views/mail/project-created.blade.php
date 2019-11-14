@component('mail::message')
# New Project: {{ $project->title }}

{{$project->description}}

@component('mail::button', ['url' => url('/projects/' . $project->id)])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
