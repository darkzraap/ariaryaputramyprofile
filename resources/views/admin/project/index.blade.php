@extends('admin.layouts.app')
@section('title', 'CMS Project List')

@section('content')

{{-- Add New Project Button --}}


{{-- Header Section --}}
<section class="bg-gradient-to-r from-purple-500 to-pink-500 py-20 md:py-32 flex items-center justify-center shadow-2xl mt-8">
    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-extrabold text-white text-center leading-tight drop-shadow-lg">
        LIST <span class="text-pink-800">YOUR</span> PROJECTS
    </h1>
</section>


<div class="container mx-auto px-4 mt-8 flex justify-center md:justify-end">
    <a href="{{ route('admin.project.create') }}" 
       class="bg-pink-600 text-white font-bold py-3 px-8 rounded-full shadow-lg
              transform transition-transform duration-300 hover:scale-105
              focus:outline-none focus:ring-4 focus:ring-pink-500 focus:ring-opacity-50">
        ADD NEW PROJECT
    </a>
</div>

{{-- Projects List Section --}}
<section class="container mx-auto px-4 py-12 md:py-20">
    <div class="space-y-6">
        @forelse($projects as $project)
            <div class="flex flex-col sm:flex-row items-center justify-between p-6 bg-gray-800 rounded-xl shadow-2xl transition-transform duration-300 hover:scale-[1.02] cursor-pointer">
                <!-- Left Section: Image and Text -->
                <div class="flex flex-col sm:flex-row items-center gap-6 text-center sm:text-left mb-4 sm:mb-0">
                    <img src="{{ Storage::url($project->cover) }}" alt="Project Cover" class="w-24 h-24 object-cover rounded-xl border-4 border-pink-500 shadow-lg"/>
                    <div class="flex flex-col justify-center">
                        <p class="font-bold text-white text-xl">{{ $project->name }}</p>
                        <p class="text-gray-400">{{ $project->tagline }}</p>
                        <p class="text-gray-400 text-sm">{{ $project->datestart }} - {{ $project->dateend }}</p>
                    </div>
                </div>

                <!-- Status Badge -->
              

                <!-- Right Section: Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center gap-4 mt-4 sm:mt-0">
                  @if($project->status == 'COMPLETE')
                    <div class="bg-green-500 px-4 py-2 rounded-full text-white font-bold text-xs shadow-md">
                        {{ $project->status }}
                    </div>
                @elseif($project->status == 'ONGOING')
                    <div class="bg-yellow-500 px-4 py-2 rounded-full text-white font-bold text-xs shadow-md">
                        {{ $project->status }}
                    </div>
                @endif
                    <a href="{{route('admin.project.assign.tool', $project)}}"
                       class="bg-purple-600 text-white font-semibold py-3 px-6 rounded-full text-sm shadow-lg
                              hover:bg-purple-700 transition-colors duration-300">
                        Add New Tools
                    </a>
                    <a href="{{route('admin.project.assign.screenshot' ,$project)}}"
                       class="bg-purple-600 text-white font-semibold py-3 px-6 rounded-full text-sm shadow-lg
                              hover:bg-purple-700 transition-colors duration-300">
                        Add Screenshots
                    </a>
                    <a href="{{route('admin.project.edit' , $project)}}"
                       class="bg-yellow-500 text-white font-semibold py-3 px-6 rounded-full text-sm shadow-lg
                              hover:bg-yellow-600 transition-colors duration-300">
                        Edit
                    </a>
                    <form action="{{route('admin.project.destroy', $project)}}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 text-white font-semibold py-3 px-6 rounded-full text-sm shadow-lg
                                       hover:bg-red-600 transition-colors duration-300">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="flex flex-col items-center justify-center py-16 bg-gray-800 rounded-xl shadow-2xl">
                <p class="text-4xl font-extrabold text-red-500 text-center mb-2">NO PROJECTS ADDED</p>
                <p class="text-xl text-gray-400 text-center">Get started by creating your first project.</p>
            </div>
        @endforelse
    </div>
</section>

@endsection
