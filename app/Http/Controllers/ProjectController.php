<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tecnology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $tecnologies = Tecnology::all();
        return view('admin.projects.create', compact('types', 'tecnologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'name' => 'required|max:255|string|unique:projects',
            'description' => 'nullable|string',
            'tecnologies' => 'exists:tecnologies,id',
        ]);
        $project = Project::create($data);
        if ($request->has('tecnologies')) {
            $project->tecnologies()->attach($data['tecnologies']);
        }
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $tecnologies = Tecnology::all();
        return view('admin.projects.edit', compact('project', 'types', 'tecnologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $request->validate([
            'name' => 'required|max:255|string|unique:projects',
            'description' => 'nullable|string',
            'tecnologies' => 'exists:tecnologies,id',
        ]);
        $project->update($data);
        if ($request->has('tecnologies')) {
            $project->tecnologies()->sync($data['tecnologies']);
        } else {
            // $post->tags()->sync([]);
            $project->tecnologies()->sync([]);
        }
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index', $project);
    }
}
