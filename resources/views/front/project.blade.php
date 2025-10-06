@extends('layot.apps')
@section('title', 'Projects | MyProfile')
@include('layot.navbar')
@section('content')

    <div class = 'bg-gradient-to-t from-itam to-dasar h-[80rem] '>

            <div class = 'flex flex-col justify-center mb-8'>
                <p class = 'text-center font-inter font-bold text-white text-[5rem]'>Project</p>
                <p class = 'text-center text-white font-inter'>I have worked on various projects that allowed me to grow my skills,<br> collaborate with different teams, and adapt to diverse challenges. Below is the list of projects I have completed,<br> either through the companies I have worked with or from external opportunities.</p>
            </div>
        

            @forelse($projects as $project)
<div class="flex justify-center mt-2 px-4 text-white">
    <div class="bg-itam w-full max-w-4xl rounded-xl p-4 sm:p-6 flex flex-col sm:flex-row items-center sm:items-stretch gap-4">
        
        <!-- Logo -->
        <div class="flex-shrink-0 flex items-center justify-center">
            <img src="{{Storage::url($project->cover)}}"
                 alt="Company Logo"
                 class="w-16 h-16 object-cover rounded-lg">
        </div>

        <!-- Company Info -->
        <div class="flex-1 flex flex-col justify-center text-center sm:text-left">
            <p class="font-bold text-lg">{{$project->name}}</p>
            <p class="text-sm text-gray-300">{{$project->tagline}}</p>
            <p class="text-sm text-gray-400">{{$project->datestart}} {{$project->dateend}}</p>
        </div>

        <!-- Actions -->
        <div class="flex flex-row gap-3 items-center">
            <a href="#" class="bg-white px-3 py-2 rounded-xl font-inter text-black ">{{$project->status}}</a>
            <a href="{{route('projectdetail',  $project->slug)}}" class="bg-mera px-3 py-2 rounded-xl text-white font-semibold
          transition-all duration-500 ease-in-out 
          hover:bg-white hover:text-mera hover:scale-110 hover:shadow-xl hover:-translate-y-1">DETAILS</a>
        </div>
    </div>
</div>
@empty
@endforelse







</div>
    @include('layot.footer')
@endsection