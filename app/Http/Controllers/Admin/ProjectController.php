<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view("admin.projects.index", [
            "projects" => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        return view("admin.projects.create", compact("types"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        $path = Storage::put("projects", $data["cover_img"]);

        $project = Project::create([
            "name" => $data["name"],
            "description" => $data["description"],
            "github_link" => $data["github_link"],
            "cover_img" => $path,
            "type_id" => $data["type_id"]

        ]);

        return redirect()->route("admin.projects.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = project::findOrFail($id);
        $types = Type::all();


        return view("admin.projects.edit", compact("project", "types"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $data = $request->validate([
            "name" => "required|string|max:255",
            "description" => "required|string",
            "cover_img" => "image|nullable",
            "github_link" => "string|nullable",
            "type_id" => "required"
        ]);

        $path = Storage::put("projects", $data["cover_img"]);

        $project->update([
            "name" => $data["name"],
            "description" => $data["description"],
            "github_link" => $data["github_link"],
            "cover_img" => $path,
            "type_id" => $data["type_id"]        
        ]);

        return redirect()->route("admin.projects.show", compact("project"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);



        $project->delete();
    }
}