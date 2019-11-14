<?php

namespace App\Http\Controllers;

use App\Project;

use Illuminate\Http\Request;

use App\Mail\ProjectCreated;

class ProjectsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
    	$projects = Project::where('owner_id', auth()->id())->get();
    	//return $projects;
    	return view('projects.index', compact('projects'));
    }
    public function show($id){
        // if($project->owner_id !== auth()->id()){
        //     abort(403);
        // }
        //abort_if($project->owner_id !== auth()->id(),403);
    	//abort_unless(auth()->user()->owns($project),403);
        
        $project = Project::findOrFail($id);
        $this->authorize('update', $project);
    	return view('projects.show', compact('project'));
    }
    public function create(){
    	return view('projects.create');
    }
    public function store(){
    	$attributes = request()->validate([
    		'title'=>['required','min:3'],
    		'description'=> ['required','min:10']
    	]);
    	$project=Project::create($attributes + ['owner_id'=>auth()->id()]);
        \Mail::to('Jo2n@example.com')->send(
            new ProjectCreated($project)
        );
    	// $project = new Project();
    	// $project->title = request('title');
    	// $project->description = request('description');
    	// $project->save();
    	return redirect('/projects');
    }
    public function edit($id){
    	$project = Project::findOrFail($id);
    	return view('projects.edit',compact('project'));
    }
    public function update($id){
    	$project = Project::findOrFail($id);

    	$project->title = request('title');
    	$project->description =  request('description');
    	$project->save();

    	return redirect('/projects');
    }
    public function destroy(Project $project){
    	$this->authorize('update', $project);
        $project->delete();
    	return redirect('/projects');
    }
}
