<?php

namespace App\Http\Controllers;

use App\Models\message;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Str;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = message::orderBy('id','desc')->get();
        return view('admin.messages.index', ['messages' => $messages]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(message $message)
    {
        return view('admin.messages.detail', ['message' => $message]);
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Message $message)
{
   
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'project' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'message' => 'required|string|max:255'
    ]);

    DB::beginTransaction();

    try {
        $message->update($validated);
        DB::commit();

        return redirect()
            ->route('admin.messages') // ✅ Make sure your route name is correct
            ->with('success', 'Message updated successfully!');
    } catch (\Exception $e) {
        DB::rollBack();

        return redirect()
            ->back()
            ->with('error', 'Failed to update message. ' . $e->getMessage());
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(message $message)
    {
        {
        try{
            $message->delete();
             return redirect()->back()->with('failed' , 'Error deleting tools');
        }catch(\Exception $e){

            DB::rollBack();
            return redirect()->back()->with('failed' , 'Error deleting tools');
        }
    }
    
    }
}
