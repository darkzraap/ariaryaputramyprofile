<?php

namespace App\Http\Controllers;


use App\Models\experience;
use App\Models\experienceTool;
use App\Models\tool;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Str;

class ExperienceToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Experience $experience)
    {
        $experience = experienceTool::orderBy('id' , 'desc')->get();
        return view('admin.experienceTool.create', ['experience' => $experience , 'tool' => $tool]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Experience $experience)
    {
         $tools = tool::orderBy('id' , 'desc')->get();
        return view('admin.experienceTool.create', ['experience' => $experience , 'tools' => $tools]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'tool_id' => 'required|integer'


        ]);


        DB::beginTransaction();

        try{
            $validated['experience_id'] = $experience->id;
            $assignTool = experienceTool::updateOrCreate($validated);

DB::commit();

        return redirect()->back()->with('success', 'New tool has been assigned to the project.');


        }catch(\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('Failed', 'Data Failed Store');
        }



    }

    /**
     * Display the specified resource.
     */
    public function show(experienceTool $experienceTool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(experienceTool $experienceTool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, experienceTool $experienceTool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(experienceTool $experienceTool)
    {
        try{
            $experienceTool->delete();
             return redirect()->back()->with('failed' , 'Error deleting tools');
        }catch(\Exception $e){

            DB::rollBack();
            return redirect()->back()->with('failed' , 'Error deleting tools');
        }
    }
}
