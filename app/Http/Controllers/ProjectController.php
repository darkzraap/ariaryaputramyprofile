<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $projects = project::orderBy('id', 'desc')->get();
       return view('admin.project.index' , ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'datestart' => 'required|date',
            'dateend' => 'after_or_equal:datestart',
            'status' => 'required|in:ONGOING,COMPLETE',
            'description' => 'required|string|max:65535',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        try{
            if($request->hasFile('cover')){
                $path  = $request->file('cover')->store('project', 'public');
                $validated['cover'] = $path;
            }
            $validated['slug'] = Str::slug($request->name);
            $newProject = project::create($validated);

            DB::commit();
            return redirect()->route('admin.project.index')->with('Succes', 'New Project added succesfully');


    }catch(\Exception $e){
        DB::rollBack();
        return redirect()->back()->with('Failed', 'Owner has not added');


    }
        

   
    }

    /**
     * Display the specified resource.
     */
    public function show(project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(project $project)
    {
      return view('admin.project.edit' , ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'datestart' => 'required|date',
            'dateend' => 'required|date|after_or_equal:datestart',
            'status' => 'required|in:ONGOING,COMPLETE',
            'description' => 'required|string|max:65535',
            'cover' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        try{
            if($request->hasFile('cover')){
                $path  = $request->file('cover')->store('project', 'public');
                $validated['cover'] = $path;
            }
            $validated['slug'] = Str::slug($request->name);
            $project->update($validated);

            DB::commit();
            return redirect()->route('admin.project.index')->with('Succes', 'New Project added succesfully');


    }catch(\Exception $e){
        DB::rollBack();
        return redirect()->back()->with('Failed', 'Owner has not added');


    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project $project)
    {
        $project->delete();

        return redirect()->route('admin.project.index')->with('Succes', 'succes deleted');
    }
}
