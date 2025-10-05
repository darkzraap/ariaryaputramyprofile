<?php

namespace App\Http\Controllers;

use App\Models\certificate;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Str;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = certificate::orderBy('id', 'desc')->get();
        return view('admin.certificate.index',[
            'certificates' => $certificates
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.certificate.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'credent' => 'required|max:255',
            'link' => 'required|max:255'
        ]);

        DB::beginTransaction();

        try{    

            $newCertificate = certificate::create($validated);
            DB::commit();

            return redirect()->route('admin.certificate.index')->with('Succes', 'Succesfully Added Certificate');
            
        }catch(\Exception $e){
            DB::rollBack();

        return redirect()->back()->with('Error', 'Failed Added Certificate');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(certificate $certificate)
    {
        
        return view('admin.certificate.edit',[
            'certificate' => $certificate
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, certificate $certificate)
    {
       $validated = $request->validate([
            'name' => 'required|string|max:255',
            'credent' => 'required|max:255',
            'link' => 'required|max:255'
        ]);

        DB::beginTransaction();

        try{    

           $certificate->update($validated);
            DB::commit();

            return redirect()->route('admin.certificate.index')->with('Succes', 'Succesfully Added Certificate');
            
        }catch(\Exception $e){
            DB::rollBack();

        return redirect()->back()->with('Error', 'Failed Added Certificate');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(certificate $certificate)
    {
        try{
            $certificate->delete();
             return redirect()->back()->with('failed' , 'Error deleting tools');
        }catch(\Exception $e){

            DB::rollBack();
            return redirect()->back()->with('failed' , 'Error deleting tools');
        }
    }
    
}
