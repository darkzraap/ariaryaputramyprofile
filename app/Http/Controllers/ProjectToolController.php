<?php

namespace App\Http\Controllers;

use App\Models\projectTool;
use App\Models\project;
use App\Models\tool;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Str;

class ProjectToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $project = projectTool::orderBy('id', 'desc')->get();
        return view('admin.projectTool.create', [
            'project' => $project ,
            'tools'=> $tools
            
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        $tools = tool::orderBy('id', 'desc')->get();
        return view('admin.projectTool.create', [
            'tools' => $tools,
            'project' => $project
        
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)

 

    {
           
    $validated = $request->validate([
        'tool_id' => 'required|integer',
    ]);

    DB::beginTransaction();
    try {
        // tambahkan project_id
        $validated['project_id'] = $project->id;
        $assignTool = projectTool::updateOrCreate($validated);
        

        DB::commit();

        return redirect()->back()->with('success', 'New tool has been assigned to the project.');
    } catch (\Exception $e) {
        DB::rollBack();

        return redirect()->back()->with('error', 'Failed to assign tool. Please try again.');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(projectTool $projectTool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(projectTool $projectTool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, projectTool $projectTool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(projectTool $projectTool)
    {

        try {
        // tambahkan project_id
        
        $projectTool->delete();
        return redirect()->back()->with('success', 'New tool has been assigned to the project.');

    } catch (\Exception $e) {
        DB::rollBack();

        return redirect()->back()->with('error', 'Failed to assign tool. Please try again.');
    }
    }
}
