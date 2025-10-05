@extends('layot.apps')
@section('title', $project->name)

@section('content')

{{-- Use a gradient background that covers the entire screen --}}
<section class="bg-gradient-to-t from-itam to-dasar min-h-screen text-white font-inter">

    {{-- Main container for centering content and responsive padding --}}
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <nav class="mb-12">
            <a href="{{ route('project') }}" class="inline-flex items-center gap-2 text-mera font-bold text-lg md:text-xl hover:text-white transition-colors duration-300">
                {{-- Adding a simple back arrow icon for better UX --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Experiences
            </a>
        </nav>

        <header class="text-center flex flex-col items-center gap-4">
            <div class="p-2 bg-white/10 rounded-full shadow-lg">
                <img src="{{ Storage::url($project->cover) }}" alt="{{ $project->name }} Logo" class="w-28 h-28 sm:w-32 sm:h-32 md:w-40 md:h-40 object-contain rounded-full">
            </div>
            <h1 class="mt-4 font-bold text-3xl md:text-5xl">{{ $project->name }}</h1>
            <p class="text-gray-300 text-base md:text-lg max-w-2xl">{{ $project->tagline }}</p>
        </header>

        <section class="mt-16 md:mt-20">
            <h2 class="text-center text-2xl md:text-3xl font-bold mb-6">About This Project</h2>
            <div class="max-w-3xl mx-auto bg-white/5 p-6 rounded-lg shadow-md">
                <p class="text-gray-200 text-base sm:text-lg leading-relaxed text-center">
                    {{ $project->description }}
                </p>
            </div>
        </section>

        <section class="mt-16 md:mt-20">
            <h2 class="text-center text-2xl md:text-3xl font-bold mb-10">Tools & Technologies Used</h2>
            
            <div class="flex flex-wrap justify-center gap-6 md:gap-8">
                {{-- Loop through each tool associated with the experience --}}
                @forelse ($project->tools as $tool)
                    <div class="bg-mera/80 backdrop-blur-sm p-4 rounded-xl flex items-center gap-4 w-full max-w-sm sm:w-80 shadow-lg hover:scale-105 hover:bg-mera transition-all duration-300">
                        <img src="{{ Storage::url($tool->logo) }}" alt="{{ $tool->name }} Logo" class="w-14 h-14 object-contain flex-shrink-0">
                        <div class="text-left">
                            <p class="font-bold text-white text-lg">{{ $tool->name }}</p>
                            <p class="text-gray-200 text-sm">{{ $tool->tagline }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400">No tools listed for this experience.</p>
                @endforelse
            </div>
        </section>

        <section class="mt-16 md:mt-20">
            <h2 class="text-center text-2xl md:text-3xl font-bold mb-10">Screenshots</h2>
            
            {{-- A responsive grid for screenshots --}}
            {{-- The @if check prevents the grid from rendering if there are no screenshots --}}
            @if($project->screenshots->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    {{-- The loop was fixed here. The container div is OUTSIDE the loop. --}}
                    @foreach ($project->screenshots as $screenshot)
                        <a href="{{ Storage::url($screenshot->screenshot) }}" target="_blank" rel="noopener noreferrer" class="block group">
                            <img src="{{ Storage::url($screenshot->screenshot) }}" 
                                 alt="Experience screenshot" 
                                 class="rounded-lg shadow-xl aspect-video object-cover w-full group-hover:scale-105 group-hover:opacity-90 transition-all duration-300">
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-400">No screenshots available for this experience.</p>
            @endif
        </section>

    </div> {{-- End of max-w-6xl container --}}

</section>

@include('layot.footer')
@endsection