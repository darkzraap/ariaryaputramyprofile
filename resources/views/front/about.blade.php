@extends('layot.apps')
@section('title', 'About | MyProfile')
@include('layot.navbar')
@section('content')

<section class="relative bg-gradient-to-t from-itam to-dasar py-20 min-h-screen flex flex-col items-center">
    <!-- Title -->
    <h1 class="text-center font-inter text-white font-extrabold text-4xl md:text-5xl lg:text-6xl tracking-tight">
        BioData
    </h1>

    <!-- Container -->
    <div class="flex flex-col lg:flex-row items-center lg:items-start justify-center mt-12 px-6 md:px-12 lg:px-20 gap-12 w-full max-w-6xl">

        <!-- Profile Image -->
        <div class="flex-shrink-0 relative group">
            @forelse($images as $image)
                <img src="{{ Storage::url($image->pict) }}"
                     alt="Profile Photo"
                     class="w-60 h-60 md:w-80 md:h-80 lg:w-[25rem] lg:h-[25rem] object-cover rounded-2xl shadow-2xl transition-transform duration-500 group-hover:scale-105">
            @empty
                <img src="https://images.unsplash.com/photo-1722691694088-b3b2ab29be31?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0"
                     alt="Default Profile"
                     class="w-60 h-60 md:w-80 md:h-80 lg:w-[25rem] lg:h-[25rem] object-cover rounded-2xl shadow-2xl">
            @endforelse
        </div>

        <!-- Bio Info -->
        <div class="flex flex-col gap-4 items-center lg:items-start text-center lg:text-left w-full max-w-lg bg-white/5 p-8 rounded-2xl shadow-xl backdrop-blur-sm border border-white/10">
            
            <div class="space-y-3 w-full">
                <div class="w-full p-4 rounded-lg  text-white font-inter font-semibold shadow-md">
                    Fullname : <span class="font-normal">Ari Arya Putra</span>
                </div>
                <div class="w-full p-4 rounded-lg  text-white font-inter font-semibold shadow-md">
                    Date of Birth : <span class="font-normal">19-09-2003</span>
                </div>
                <div class="w-full p-4 rounded-lg  text-white font-inter font-semibold shadow-md">
                    Gender : <span class="font-normal">Male</span>
                </div>
                <div class="w-full p-4 rounded-lg  text-white font-inter font-semibold shadow-md">
                    Nationality : <span class="font-normal">Indonesia</span>
                </div>
                <div class="w-full p-4 rounded-lg  text-white font-inter font-semibold shadow-md">
                    Domicile : <span class="font-normal">Bandung</span>
                </div>
                <div class="w-full p-4 rounded-lg  text-white font-inter font-semibold shadow-md">
                    Hobbies : <span class="font-normal">Study, Computer, Sing</span>
                </div>
                <div class="w-full p-4 rounded-lg  text-white font-inter font-semibold shadow-md">
                    Email : <span class="font-normal">ariaryaputra5@Gmail.com</span>
                </div>
                <div class="w-full p-4 rounded-lg  text-white font-inter font-semibold shadow-md">
                    Phone : <span class="font-normal">+62 89659283270</span>
                </div>
                <div class="w-full p-4 rounded-lg  text-white font-inter font-semibold shadow-md">
                    Languages : <span class="font-normal">Indonesia & English</span>
                </div>
                <div class="w-full p-4 rounded-lg  text-white font-inter font-semibold shadow-md">
                    Institution : <br>
                    <span class="font-normal leading-relaxed">
                        Universitas Sangga Buana <br>
                        Bachelor Informatics Engineering
                    </span>
                </div>
            </div>

            <!-- Buttons -->
            <div class="mt-8 flex flex-col sm:flex-row gap-4 w-full">
                <a href="{{route('certificate')}}"
                   class="flex-1 text-center bg-mera px-6 py-4 rounded-xl font-inter text-white font-bold shadow-lg hover:bg-red-600 transition duration-300 transform hover:-translate-y-1 hover:shadow-2xl">
                   See My Certifications
                </a>
                <a href="{{route('experience')}}"
                   class="flex-1 text-center bg-mera px-6 py-4 rounded-xl font-inter text-white font-bold shadow-lg hover:bg-red-600 transition duration-300 transform hover:-translate-y-1 hover:shadow-2xl">
                   Continue to My Experiences
                </a>
            </div>
        </div>
    </div>

    <!-- Social Icons -->
    <div class="mt-16 flex flex-wrap justify-center gap-4 sm:gap-6">
        <a href="https://github.com/darkzraap" target="_blank" 
           class="w-12 h-12 sm:w-14 sm:h-14 flex items-center justify-center rounded-full bg-white/10 hover:bg-mera transition duration-300 shadow-md hover:shadow-xl">
          <img src="{{ asset('images/github.png') }}" alt="GitHub" class="w-6 h-6 sm:w-7 sm:h-7 object-contain">
        </a>
        <a href="mailto:ariaryaputra5@gmail.com" target="_blank" 
           class="w-12 h-12 sm:w-14 sm:h-14 flex items-center justify-center rounded-full bg-white/10 hover:bg-mera transition duration-300 shadow-md hover:shadow-xl">
          <img src="{{ asset('images/gmail.png') }}" alt="Gmail" class="w-6 h-6 sm:w-7 sm:h-7 object-contain">
        </a>
        <a href="https://www.linkedin.com/in/ari-arya-putra-9975a023a?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" 
           class="w-12 h-12 sm:w-14 sm:h-14 flex items-center justify-center rounded-full bg-white/10 hover:bg-mera transition duration-300 shadow-md hover:shadow-xl">
          <img src="{{ asset('images/linkdln.png') }}" alt="LinkedIn" class="w-6 h-6 sm:w-7 sm:h-7 object-contain">
        </a>
        <a href="https://wa.me/+6289659283270" target="_blank" 
           class="w-12 h-12 sm:w-14 sm:h-14 flex items-center justify-center rounded-full bg-white/10 hover:bg-mera transition duration-300 shadow-md hover:shadow-xl">
          <img src="{{ asset('images/whatsaap.png') }}" alt="WhatsApp" class="w-6 h-6 sm:w-7 sm:h-7 object-contain">
        </a>
    </div>
</section>

@include('layot.footer')
@endsection
