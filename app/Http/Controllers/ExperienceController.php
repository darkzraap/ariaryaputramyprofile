<?php

namespace App\Http\Controllers;

use App\Models\experience;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Str;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = experience::orderBy('id', 'desc')->get();
        return view('admin.experience.index' , ['experiences' => $experiences]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.experience.create');
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
                $path  = $request->file('cover')->store('experience', 'public');
                $validated['cover'] = $path;
            }
            $validated['slug'] = Str::slug($request->name);
            $newExperience = experience::create($validated);

            DB::commit();
            return redirect()->route('admin.experience.index')->with('Succes', 'New Experience added succesfully');


    }catch(\Exception $e){
        DB::rollBack();
        return redirect()->back()->with('Failed', 'Owner has not added');


    }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(experience $experience)
    {
       return view('admin.experience.edit' , ['experience' => $experience]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, experience $experience)
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
                $path  = $request->file('cover')->store('experience', 'public');
                $validated['cover'] = $path;
            }
            $validated['slug'] = Str::slug($request->name);
            $experience->update($validated);

            DB::commit();
            return redirect()->route('admin.experience.index')->with('Succes', 'New Experience updated succesfully');


    }catch(\Exception $e){
        DB::rollBack();
        return redirect()->back()->with('Failed', 'Owner has not added');


    }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experience.index')->with('Succes', 'New Experience deleted succesfully');
    }
}
