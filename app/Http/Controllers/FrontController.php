<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\owner;
use Illuminate\Http\Request;
use App\Models\tool;
use App\Models\experience;
use App\Models\project;
use App\Models\certificate;
use App\Models\message;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Str;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = owner::orderBy('id','desc')->get();
        $tools = tool::orderBy('id','desc')->get();
        return view('front.home', ['tags' => $tags , 'tools' => $tools]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|max:255',
            'location' => 'required|max:255',
            'project' => 'required|max:255',
            'phone' => 'required|max:255',
            'message' => 'required|max:255'
        ]);

        DB::beginTransaction();

        try{    

            $newMessage = message::create($validated);
            DB::commit();

            return redirect()->route('home')->with('Succes', 'Succesfully Added Message');
            
        }catch(\Exception $e){
            DB::rollBack();

        return redirect()->back()->with('Error', 'Failed Added Message');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cr $cr)
    {
        //
    }

    public function about()
    {
        $images = owner::orderBy('id','desc')->get();
        return view('front.about' , ['images' => $images]);
    }

    public function tooldetail(tool $tool)
    {
        return view('front.tooldetail', ['tool' => $tool]);
    }

    public function experience()
    {
        $experiences = experience::orderBy('id', 'desc')->get();
        return view('front.experience', ['experiences' => $experiences]);
    } 

    public function project()
    {
        $projects = project::orderBy('id', 'desc')->get();
        return view('front.project', ['projects' => $projects]);
    } 

    public function certificate()
    {
        $certificates = certificate::orderBy('id', 'desc')->get();
        return view('front.certificate', ['certificates' => $certificates]);
    } 

    public function hire()
    {
         return view('front.hire');
    }
    
    public function experiencedetail(experience $experience)
    {
        return view('front.experiencedetails',['experience' => $experience]);
    }

     public function projectdetail(project $project)
    {
        return view('front.projectdetails',['project' => $project]);
    }
}
