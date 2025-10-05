@extends('layot.apps')
@section('title', $tool->name)

@section('content')

{{-- The main section with a gradient background, covering the full screen height --}}
<section class="bg-gradient-to-t from-itam to-dasar min-h-screen text-white font-inter">

    {{-- A centered container with responsive padding to keep content neat --}}
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <nav class="mb-12">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-mera font-bold text-lg md:text-xl hover:text-white transition-colors duration-300">
                {{-- SVG arrow icon for a clearer "Back" action --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Home
            </a>
        </nav>

        {{-- Main header for the tool details, centered and well-spaced --}}
        <header class="text-center flex flex-col items-center gap-4">
            {{-- A styled container for the logo to make it pop --}}
            <div class="p-2 bg-white/10 rounded-full shadow-lg">
                <img src="{{ Storage::url($tool->logo) }}" alt="{{ $tool->name }} Logo" class="w-28 h-28 sm:w-32 sm:h-32 md:w-40 md:h-40 object-contain rounded-full">
            </div>
            
            {{-- Use h1 for the main title for SEO and accessibility --}}
            <h1 class="mt-4 font-bold text-3xl md:text-5xl">{{ $tool->name }}</h1>
            
            <p class="text-gray-300 text-base md:text-lg max-w-2xl">{{ $tool->tagline }}</p>
        </header>

        <section class="mt-16 md:mt-20">
             <h2 class="text-center text-2xl md:text-3xl font-bold mb-6">About {{ $tool->name }}</h2>
            
            {{-- A modern-looking container for the description text --}}
            <div class="max-w-3xl mx-auto bg-white/5 backdrop-blur-sm p-6 sm:p-8 rounded-lg shadow-md">
                <p class="text-gray-200 text-base sm:text-lg leading-relaxed text-center">
                    {!! $tool->description !!}
                </p>
            </div>
        </section>

    </div> {{-- End of max-w-5xl container --}}

</section>

@include('layot.footer')
@endsection