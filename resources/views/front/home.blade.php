@extends('layot.apps')
@section('title', 'Home | MyProfile')
@include('layot.navbar')
@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-t from-itam to-dasar flex flex-col md:flex-row items-center relative overflow-hidden px-6 md:px-12 py-12 md:h-[42rem]">
  <!-- Left content -->
  <div class="relative z-10 flex-1 text-center md:text-left space-y-4">
    <h1 class="font-libre font-bold text-white text-4xl sm:text-4xl md:text-5xl leading-tight">
      Hello,<br> I'm <span class="text-mera">Arya</span>
    </h1>
    @forelse($tags as $tag)
    <p class="font-inter text-white text-sm sm:text-base tracking-wide">
      {{$tag->tagline}}
    </p>
    @empty
        <p class="font-inter text-white text-sm sm:text-base tracking-wide">
      No Data
    </p>
    @endforelse
  </div>

  <!-- Right image -->
<div class="flex justify-end">
  <div class="flex-1 relative flex justify-end">
    <img src="{{ asset('images/bgpoto.png') }}" 
         alt="Profile" 
         class="w-full max-w-[34rem] h-auto object-contain">
  </div>
</div>

  <!-- Social icons -->
  <div class="absolute bottom-4 sm:bottom-6 left-4 sm:left-12 flex space-x-4 sm:space-x-6 z-20">
    <a href="https://github.com/darkzraap" target="_blank" 
       class="w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-mera ">
      <img src="{{ asset('images/github.png') }}" alt="GitHub" class="w-5 h-5 sm:w-6 sm:h-6 object-contain">
    </a>
    <a href="mailto:ariaryaputra5@gmail.com" target="_blank" 
       class="w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-mera ">
      <img src="{{ asset('images/gmail.png') }}" alt="Gmail" class="w-5 h-5 sm:w-6 sm:h-6 object-contain">
    </a>
    <a href="https://www.linkedin.com/in/ari-arya-putra-9975a023a?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" 
       class="w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-mera ">
      <img src="{{ asset('images/linkdln.png') }}" alt="LinkedIn" class="w-5 h-5 sm:w-6 sm:h-6 object-contain">
    </a>
    <a href="https://wa.me/+6289659283270" target="_blank" 
       class="w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-mera ">
      <img src="{{ asset('images/whatsaap.png') }}" alt="WhatsApp" class="w-5 h-5 sm:w-6 sm:h-6 object-contain">
    </a>
  </div>
</section>

<!-- Interests Section -->
<section class="bg-white flex flex-col lg:flex-row">
  <!-- Left: Image -->
  <div class="lg:w-1/2 w-full">
    <img src="{{ asset('images/bg1.png') }}" alt="Background" class="w-full h-[20rem] sm:h-[30rem] lg:h-[46rem] object-cover">
  </div>

  <!-- Right: Content -->
  <div class="lg:w-1/2 w-full flex flex-col justify-center px-6 sm:px-10 py-10">
    <div class="mb-8 text-center">
      <h2 class="font-libre font-bold text-2xl sm:text-3xl md:text-4xl lg:text-[4rem] text-mera mb-4">My Interests</h2>
      @forelse($tags as $tag)
      <p class="font-inter text-gray-600 leading-relaxed text-sm sm:text-base">
       {{$tag->about}}
      </p>
      @empty
      <p class="font-inter text-gray-600 leading-relaxed text-sm sm:text-base">
       No Data
      </p>
      @endforelse
    </div>

    <!-- Cards -->
    <div class="grid grid-cols-2 md:flex md:gap-4 justify-center items-center gap-4">
      <!-- Card 1 -->
      <div class="relative font-franklin font-bold text-[14px] sm:text-[16px] text-center h-[14rem] sm:h-[16rem] md:h-[18rem] w-full sm:w-[8rem] bg-gradient-to-t from-itam to-mera rounded-lg text-white shadow-lg">
        <img src="{{ asset('images/networking.png') }}" alt="Networking" class="absolute top-3 left-3 w-6 h-6 sm:w-8 sm:h-8 object-contain">
        <div class="flex items-center justify-center h-full">
          <p>GOOD COM</p>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="relative font-franklin font-bold text-[14px] sm:text-[16px] text-center h-[14rem] sm:h-[16rem] md:h-[18rem] w-full sm:w-[8rem] bg-gradient-to-t from-itam to-oren rounded-lg text-white shadow-lg">
        <img src="{{ asset('images/lightning.png') }}" alt="Creative" class="absolute top-3 left-3 w-6 h-6 sm:w-8 sm:h-8 object-contain">
        <div class="flex items-center justify-center h-full">
          <p>CREATIVE</p>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="relative font-franklin font-bold text-[14px] sm:text-[16px] text-center h-[14rem] sm:h-[16rem] md:h-[18rem] w-full sm:w-[8rem] bg-gradient-to-t from-itam to-biru rounded-lg text-white shadow-lg">
        <img src="{{ asset('images/group.png') }}" alt="Fast Learner" class="absolute top-3 left-3 w-6 h-6 sm:w-8 sm:h-8 object-contain">
        <div class="flex items-center justify-center h-full">
          <p>FAST LEARNER</p>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="relative font-franklin font-bold text-[14px] sm:text-[16px] text-center h-[14rem] sm:h-[16rem] md:h-[18rem] w-full sm:w-[8rem] bg-gradient-to-t from-itam to-pin rounded-lg text-white shadow-lg">
        <img src="{{ asset('images/puzzle.png') }}" alt="Team Work" class="absolute top-3 left-3 w-6 h-6 sm:w-8 sm:h-8 object-contain">
        <div class="flex items-center justify-center h-full">
          <p>TEAM WORK</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class = 'bg-gradient-to-t from-dasar to-itam h-[70rem]'> 

    <div class = 'flex flex-col justify-center items-center text-white'>
        <p class = 'font-inter font-bold text-[4rem] mt-5'>Tools</p>
        <p class = 'font-inter text-[20px]'>Click To See Detail Skill</p>
    </div>
  

@php
    // --- Configuration ---
    $itemWidthRem = 24; // The width of one item (w-[24rem])
    $gapRem = 2;        // The gap between items

    // --- Dynamic Calculations ---
    $totalItems = count($tools) ?: 1;
    $totalWidthRem = $totalItems * ($itemWidthRem + $gapRem);
    
    // Make the animation speed consistent: 8 seconds per item
    $animationDuration = $totalItems * 8; 
    
    // Calculate the delay interval based on the new dynamic duration
    $delayInterval = $animationDuration / $totalItems;
@endphp
<style>
    @keyframes scrollLeft {
        to {
            transform: translateX(-{{ $totalWidthRem }}rem);
        }
    }

    .animate-scroll-dynamic {
        animation: scrollLeft {{ $animationDuration }}s linear infinite;
    }
</style>
 

<div class="relative h-[8rem] mt-8 overflow-hidden group">

    @forelse($tools as $tool)
        @php
            // Calculate the specific negative delay for this item
            $currentDelay = $loop->index * $delayInterval;
        @endphp

        <a href="{{route('tooldetail' , $tool)}}"
           class="group-hover:[animation-play-state:paused] hover:bg-white hover:text-black w-[24rem] h-[8rem] bg-mera p-3 font-inter text-white rounded-xl absolute left-[100%] animate-scroll-dynamic flex items-center justify-center gap-3"
           style="animation-delay: -{{ $currentDelay }}s;">
            
            <img src="{{Storage::url($tool->logo) }}" alt="{{ $tool->name }} Logo" class="w-14 h-14">
            <div>
                <p class="font-bold text-2xl">{{ $tool->name }}</p>
                <p class="text-sm">{{ $tool->tagline }}</p>
            </div>
        </a>
    @empty
        <p class="text-center text-gray-500">No tools to display.</p>
    @endforelse

</div>



    <div class = 'flex flex-col justify-center items-center text-white mt-8'>
        <p class = 'font-inter font-bold text-[4rem] mt-5'>Get In Touch!!!</p>
        <p class = 'font-inter text-[20px]'>Take a little peek at what I’ve been working on</p>
    </div>

<div class="flex justify-center mt-8 flex-col justify-center items-center gap-5">
  <!-- Image -->
  <img src="{{ asset('images/peak.png') }}" alt="Peak Image" class="w-full max-w-2xl rounded-lg object-cover">

  <!-- Overlay button -->

  <div class = 'flex gap-5'>
  <a href="{{route('hire')}}"
     class=" inset-x-0 bottom-6 flex justify-center">
    <div class="font-inter bg-white text-black px-6 py-3 rounded-lg shadow-md
                hover:bg-black hover:text-white  text-center">
      Send Message
    </div>
  </a>

    <a href="{{route('project')}}"
     class=" inset-x-0 bottom-6 flex justify-center">
    <div class="font-inter bg-mera text-white px-6 py-3 rounded-lg shadow-md
                hover:bg-black hover:text-white  text-center">
      See My Project
    </div>
  </a>
</div>
</div>



</section>

@include('layot.footer')

@endsection
