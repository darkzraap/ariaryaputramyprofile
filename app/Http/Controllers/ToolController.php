<?php

namespace App\Http\Controllers;

use App\Models\tool;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Str;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tools = tool::orderBy('id', 'desc')->get();
        return view('admin.tool.index', ['tools' => $tools]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tool.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'description' => 'required|string|max:65535',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        try{
            if($request->hasFile('logo')){
                $path = $request->file('logo')->store('tool', 'public');
                $validated['logo'] = $path;

            }

            $newTool = tool::create($validated);

            DB::commit();

            return redirect()->route('admin.tool.index')->with('Succes', 'Tool Added Succesfully');


        }

        catch(\Exception $e){

            DB::rollBack();
             return redirect()->back()->with('Succes', 'Tool Added Succesfully');



        }



    }

    /**
     * Display the specified resource.
     */
    public function show(tool $tool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tool $tool)
    {
        return view('admin.tool.edit', ['tool' => $tool]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tool $tool)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'description' => 'required|string|max:65535',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        try{
            if($request->hasFile('logo')){
                $path = $request->file('logo')->store('tool', 'public');
                $validated['logo'] = $path;

            }

            $tool->update($validated);

            DB::commit();

            return redirect()->route('admin.tool.index')->with('Succes', 'Tool Updated Succesfully');


        }

        catch(\Exception $e){

            DB::rollBack();
             return redirect()->back()->with('Succes', 'Tool Added Succesfully');



        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tool $tool)
    {
        $tool->delete();
        return redirect()->route('admin.tool.index')->with('Succes', 'New Tool deleted succesfully');
    }

    
}
