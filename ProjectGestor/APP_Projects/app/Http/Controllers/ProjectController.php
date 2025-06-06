<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\SustainabilityCategory;
use App\Models\SustainabilityMetric;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(6);
        return view('projects/index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->accountType == 'General User' or Auth::user()->accountType == 'Analyst'){
            abort(403);
        }
        return view('projects/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $project = new Project();
        $project->project_name = $request->project_name;
        $project->description = $request->description;
        $project->budget = $request->budget;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->overall_sustainability_score = $request->overall_sustainability_score;
        $project->save();
      

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        return view('projects/show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::guest()){
            return redirect('/users/login');
        }
        if (Auth::user()->accountType == 'General User' or Auth::user()->accountType == 'Analyst'){
            abort(403);
        }

        $project = Project::find($id);
        return view('projects/edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
   
        $project = Project::find($request->id);
        $project->project_name = $request->project_name;
        $project->description = $request->description;
        $project->budget = $request->budget;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->overall_sustainability_score = $request->overall_sustainability_score;
        $project->save();

        return redirect('projects/'.$project->id);
    }

    public function destroy(string $id)
    {
        if (Auth::user()->accountType == 'General User' or Auth::user()->accountType == 'Analyst'){
            abort(403);
        }
        $project = Project::find($id);
        $project->delete();
        return redirect('/projects');
    }
    public function prediction(string $id)
    {   
        if (Auth::user()->accountType == 'General User'){
            abort(403);
        }
        dd('prediction');
        $project = Project::find($id);
        return view('projects/show', ['project' => $project]);
    }
}
