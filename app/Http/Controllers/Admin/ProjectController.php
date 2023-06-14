<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();
        $types = Type::all();
        $projects = Project::all();
        return view('admin.projects.index', compact('projects','types','technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.projects.create', compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)//create
    {

        $val_data = $request->validated();
        $slug = Project::genetareSlug($val_data['title']);
        $val_data['slug'] = $slug;
        /* dd($val_data); */
        Project::create($val_data);
        return to_route('admin.projects.index')->with('message', 'Project created');
    }

    /**
     * Display the specified resource.
     *
     * @param   \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(/* $slug */Project $project)
    {
        /*   $project = Project::where('slug', $slug)->first(); */
        /*  $technologies = Technology::all() */;
        return view('admin.projects.show', compact('project'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param   \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    
    {
        
        $technologies = Technology::all();
        $types = Type::all();
        
        return view('admin.projects.edit', compact('project','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        
        $val_data = $request->validated();
        $slug = Project::genetareSlug($val_data['title']);
        $val_data['slug'] = $slug;
        $project->update($val_data);
        /* dd($val_data); */
       
        return to_route('admin.projects.index')->with('message', 'Project: ' . $project->title . ' Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index')->with('message', 'Project: ' . $project->title . ' Deleted');
    }
}
