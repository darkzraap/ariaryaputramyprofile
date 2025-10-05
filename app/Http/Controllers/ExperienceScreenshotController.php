<?php

namespace App\Http\Controllers;

use App\Models\experienceScreenshot;
use App\Models\experience;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Str;


class ExperienceScreenshotController extends Controller
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
    public function create(Experience $experience)
    {
        return view('admin.experienceScreenshot.create', [
            'experience' => $experience
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'screenshot' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        DB::beginTransaction();

        try{

            if($request->hasFile('screenshot')){
                $path = $request->file('screenshot')->store('experience_screenshot' , 'public');
                $validated['screenshot'] = $path;
            }

            $validated['experience_id'] = $experience->id;
            $newExpScreenshoot = experienceScreenshot::create($validated);
            DB::commit();

            return redirect()->back()->with('Succes' , 'New Screenshot to the project added');


        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('Failed' , 'New Screenshot to the project Failed');
        }




    }

    /**
     * Display the specified resource.
     */
    public function show(experienceScreenshot $experienceScreenshot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(experienceScreenshot $experienceScreenshot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, experienceScreenshot $experienceScreenshot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(experienceScreenshot $experienceScreenshot)
    {
               try {
        // tambahkan project_id
        
        $experienceScreenshot->delete();
        return redirect()->back()->with('success', 'New tool has been assigned to the project.');

    } catch (\Exception $e) {
        DB::rollBack();

        return redirect()->back()->with('error', 'Failed to assign tool. Please try again.');
    }
    }
    
}
