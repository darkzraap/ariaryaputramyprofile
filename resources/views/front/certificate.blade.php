@extends('layot.apps')
@section('title', 'Experience | MyProfile')

@include('layot.navbar')

@section('content')
<div class="bg-gradient-to-t from-itam to-dasar min-h-screen py-16 px-6">

    <!-- Section Title -->
    <div class="max-w-3xl mx-auto text-center mb-12">
        <h1 class="font-inter font-extrabold text-white text-5xl sm:text-6xl mb-4">Certificates</h1>
        <p class="text-gray-300 font-inter text-base sm:text-lg leading-relaxed">
            I have completed several certifications and specializations that strengthened my knowledge 
            and professional skills. Below is the list of certificates I have earned through 
            learning programs and professional training.
        </p>
    </div>

    <!-- Certificate List -->
    <div class="space-y-6 max-w-4xl mx-auto">
        @forelse($certificates as $certificate)
            <div class="bg-itam rounded-2xl shadow-lg hover:shadow-xl transition p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                
                <!-- Certificate Info -->
                <div class="flex-1 text-center sm:text-left">
                    <h2 class="text-white font-bold text-sm">{{ $certificate->name }}</h2>
                    <p class="text-sm text-gray-400">{{ $certificate->credent }}</p>
                </div>

                <!-- Actions -->
                <div>
                    <a href="{{ $certificate->link }}" target = '_blank' 
                       class="inline-block bg-white text-black font-inter font-semibold px-4 py-2 rounded-xl shadow-md hover:bg-mera hover:text-white transition hover:scale-110 hover:shadow-xl hover:-translate-y-1">
                        Show Credential
                    </a>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-400 font-inter text-lg">No certificates available at the moment.</p>
        @endforelse
    </div>

</div>

@include('layot.footer')
@endsection
