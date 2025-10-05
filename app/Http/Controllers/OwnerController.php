<?php

namespace App\Http\Controllers;

use App\Models\owner;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;


class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = owner::orderBy('id' , 'desc')->get();
        $owners2 = owner::whereNull('deleted_at')->count();


        return view('admin.owner.index', [
            'owners' => $owners,
            'owners2' => $owners2
        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ownercount = owner::count();
        return view('admin.owner.create', ['ownercount' => $ownercount]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
         'tagline' => 'required|string|max:255',
         'about' => 'required|string|max:2048',
        'pict' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]

    );

        DB::beginTransaction();

        try{
        if($request->hasFile('pict')){
            $path = $request->file('pict')->store('owner', 'public');
            $validated['pict'] = $path;
          
            $newOwner  = owner::create($validated);

        }
        DB::commit();

        return redirect()->route('admin.owner.index')->with('succes', 'owner has been created succes');



        }catch(\Exception $e){

            DB::rollBack();

            return redirect()->back()->with('error', 'owner fail to create');


        }
    }

    /**
     * Display the specified resource.
     */
    public function show(owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(owner $owner)
    {
       return view('admin.owner.edit', ['owner' => $owner]);  

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, owner $owner)
    {
       $validated = $request->validate([
        'name' => 'required|string|max:255',
         'tagline' => 'required|string|max:255',
         'about' => 'required|string|max:2048',
        'pict' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]

    );

        DB::beginTransaction();

        try{
        if($request->hasFile('pict')){
            $path = $request->file('pict')->store('owner', 'public');
            $validated['pict'] = $path;
            
         

        }

           $owner->update($validated);
        DB::commit();

        return redirect()->route('admin.owner.index')->with('succes', 'owner has been created succes');



        }catch(\Exception $e){

            DB::rollBack();

            return redirect()->back()->with('error', 'owner fail to create');


        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(owner $owner)
    {
        $owner->delete();
         return redirect()->back()->with('Succes', 'Succesfully Deleted Owner');
    }
}
