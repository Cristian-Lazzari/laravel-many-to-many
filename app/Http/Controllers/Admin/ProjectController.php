<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // private $validations = [
    //     'name'          => 'required|string|min:5|max:100',
    //     'link'          => 'required|string|max:500',
    //     'link_github'   => 'required|string|max:500',
    //     'url_image'     => 'string|max:500',
    //     'url_gif'       => 'string|max:500',
    //     'description'   => 'string',
    // ];

    public function index()
    {
        $projects = Project::paginate(5);

        return view('admin.projects.index', compact('projects'));
    }
    
    
    public function create()
    {
        return view('admin.projects.create');
    }


    public function store(Request $request)
    {
        
        //$request->validate($this->validations);
        
        $data = $request->all();
        dd($data);
        $newProject = new Project();
        
        $newProject->name          = $data['name'];
        $newProject->link          = $data['link'];
        $newProject->link_github   = $data['link_github'];
        $newProject->url_image     = $data['url_image'];
        $newProject->url_gif       = $data['url_gif'];
        $newProject->description   = $data['description'];

        $newProject->save();
        
        
		return redirect()->route('admin.projects.show', ['project' => $newProject->id]);
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }
    
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
       //$request->validate($this->validations);
        
        $data = $request->all();

        
        $project->name          = $data['name'];
        $project->link          = $data['link'];
        $project->link_github   = $data['link_github'];
        $project->url_image     = $data['url_image'];
        $project->url_gif       = $data['url_gif'];
        $project->description   = $data['description'];

        $project->update();
        
        
		return to_route('admin.projects.index', ['project' => $project]);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index')->with('delete_success', $project);
    }


    
    public function restore($id)
    {
        Project::withTrashed()->where('id', $id)->restore();

        $project = Project::find($id);

        return to_route('admin.projects.index')->with('restore_success', $project);
    }


    public function trashed()
    {
        $trashedProjects = Project::onlyTrashed()->paginate(3); 

        

        return view('admin.projects.trashed', compact('trashedProjects'));
    }
    public function hardDelete($id)
    {
        $project = Project::withTrashed()->find($id);
        $project->forceDelete();

        return to_route('admin.projects.trashed')->with('delete_success', $project);
    
    }
}
