@extends('admin.layouts.app')
@section('title', 'Create New Experience')

@section('content')

<section class="bg-gradient-to-r from-purple-500 to-pink-500 h-40 flex items-center justify-center shadow-lg">
    <h1 class="text-6xl md:text-7xl font-extrabold text-white text-center">
        ADD <span class="text-pink-800 drop-shadow-lg">NEW</span> CERTIFICATE !!!
    </h1>
</section>

<div class="container mx-auto px-4 py-12">
    <form action="{{ route('admin.certificate.update' , $certificate) }}" enctype="multipart/form-data" method="POST"
        class="space-y-12">
        @csrf
        @method('PUT')

        <section class="bg-gray-800 p-8 md:p-12 rounded-2xl shadow-2xl space-y-8">
            <h2 class="text-3xl font-bold text-white mb-6 border-b-2 border-purple-500 pb-2">Certificate Details</h2>

            <div class="flex flex-col justify-center gap-5">
                
                
                <div class="flex flex-col">
                    <label for="name" class="text-gray-300 font-semibold mb-2">Certificate Name</label>
                    <input type="text" id="name" name="name" value="{{$certificate->name}}"
                         class="w-full bg-gray-700 text-white border border-gray-600 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300 placeholder-gray-400"
                        placeholder="BuildwithAngga...">
                    @error('name')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="tagline" class="text-gray-300 font-semibold mb-2">Unique Certificate Code</label>
                    <input type="text" id="credent" name="credent" value="{{$certificate->credent}}"
                        class="w-full bg-gray-700 text-white border border-gray-600 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300 placeholder-gray-400"
                        placeholder="#k44kc...">
                    @error('tagline')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                 <div class="flex flex-col">
                    <label for="tagline" class="text-gray-300 font-semibold mb-2">Insert Link</label>
                    <input type="text" id="link" name="link" value="{{$certificate->link}}"
                        class="w-full bg-gray-700 text-white border border-gray-600 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300 placeholder-gray-400"
                        placeholder="#k44kc...">
                    @error('tagline')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

     

        <div class="flex justify-center">
            <button type="submit"
                class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-4 px-12 rounded-full shadow-lg transform transition-transform duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-500 focus:ring-opacity-50">
                SUBMIT EXPERIENCE
            </button>
        
        </div>
    </form>
           
</div>


@endsection