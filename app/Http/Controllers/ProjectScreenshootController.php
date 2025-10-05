<?php

namespace App\Http\Controllers;

use App\Models\projectScreenshoot;
use App\Models\project;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Str;

class ProjectScreenshootController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('admin.projectScreenshot.create', ['project' => $project]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        $validated = $request->validate([
            'screenshot' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        DB::beginTransaction();

        try{

            if($request->hasFile('screenshot')){
                $path = $request->file('screenshot')->store('project_screenshot' , 'public');
                $validated['screenshot'] = $path;
            }

            $validated['project_id'] = $project->id;

            $newScreenshot = projectScreenshoot::create($validated);
            DB::commit();

            return redirect()->back()->with('Succes', 'New Screenshoot has added');

        }catch(\Exception $e){

            DB::rollBack();

    return redirect()->back()->with('Failed', 'New Screenshoot hasnot added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(projectScreenshoot $projectScreenshoot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(projectScreenshoot $projectScreenshoot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, projectScreenshoot $projectScreenshoot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(projectScreenshoot $projectScreenshoot)
    {
        try {
        // tambahkan project_id
        
        $projectScreenshoot->delete();
        return redirect()->back()->with('success', 'New tool has been assigned to the project.');

    } catch (\Exception $e) {
        DB::rollBack();

        return redirect()->back()->with('error', 'Failed to assign tool. Please try again.');
    }
    }
}
