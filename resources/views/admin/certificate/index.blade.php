@extends('admin.layouts.app')
@section('title', 'CMS Tools List')

@section('content')

{{-- Add New Project Button --}}


{{-- Header Section --}}
<section class="bg-gradient-to-r from-purple-500 to-pink-500 py-20 md:py-32 flex items-center justify-center shadow-2xl mt-8">
    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-extrabold text-white text-center leading-tight drop-shadow-lg">
        LIST <span class="text-pink-800">YOUR</span> TOOLS STACK !!!
    </h1>
</section>


<div class="container mx-auto px-4 mt-8 flex justify-center md:justify-end">
    <a href="{{ route('admin.certificate.create') }}" 
       class="bg-pink-600 text-white font-bold py-3 px-8 rounded-full shadow-lg
              transform transition-transform duration-300 hover:scale-105
              focus:outline-none focus:ring-4 focus:ring-pink-500 focus:ring-opacity-50">
        ADD NEW CERTIFICATE
    </a>
</div>

{{-- Projects List Section --}}
<section class="container mx-auto px-4 py-12 md:py-20">
    <div class="space-y-6">
        @forelse($certificates as $certificate)
            <div class="flex flex-col sm:flex-row items-center justify-between p-6 bg-gray-800 rounded-xl shadow-2xl transition-transform duration-300 hover:scale-[1.02] cursor-pointer">
                <div class="flex flex-col sm:flex-row items-center gap-6 text-center sm:text-left mb-4 sm:mb-0">
                    <p class = 'text-white font-bold text-[18px]'>{{$certificate->name}}</p>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-6 text-center sm:text-left mb-4 sm:mb-0">
                    <p class = 'text-gray-600 font-bold text-[20px]'>{{$certificate->credent}}</p>
                </div>

                <div class="flex gap-4">
                    <a href="{{$certificate->link}}"
                       class="bg-blue-500 text-white font-semibold py-3 px-6 rounded-full text-sm shadow-lg
                              hover:bg-yellow-600 transition-colors duration-300">
                        Open Link Certification
                    </a>
                      <a href="{{route('admin.certificate.edit', $certificate)}}"
                       class="bg-yellow-500 text-white font-semibold py-3 px-6 rounded-full text-sm shadow-lg
                              hover:bg-yellow-600 transition-colors duration-300">
                        Edit
                    </a>
                    
                    <form action="{{route('admin.certificate.destroy', $certificate)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 text-white font-semibold py-3 px-6 rounded-full text-sm shadow-lg
                                       hover:bg-red-600 transition-colors duration-300"
                              >
                            Delete
                        </button>
                    </form>
                </div>
            </div>

            

            @empty
            <div class="flex flex-col items-center justify-center py-16 bg-gray-800 rounded-xl shadow-2xl">
                <p class="text-4xl font-extrabold text-red-500 text-center mb-2">NO CERTIFICATE ADDED</p>
                <p class="text-xl text-gray-400 text-center">Get started by adding your Certification.</p>
            </div>
            @endforelse
    </div>
</section>


@endsection