@extends('layot.apps')
@section('title', 'Experience | MyProfile')
@include('layot.navbar')
@section('content')

    <div class = 'bg-gradient-to-t from-itam to-dasar h-[80rem] '>

            <div class = 'flex flex-col justify-center mb-8'>
                <p class = 'text-center font-inter font-bold text-white text-[5rem]'>Experiences</p>
                <p class = 'text-center text-white font-inter'>I have experience working with several companies, where I built my skills, worked in teams,<br> and learned to adapt to different challenges. Below is the list of companies where I have gained <br>my professional experience.</p>
            </div>
        

            @forelse($experiences as $experience)
<div class="flex justify-center mt-2 px-4 text-white">
    <div class="bg-itam w-full max-w-4xl rounded-xl p-4 sm:p-6 flex flex-col sm:flex-row items-center sm:items-stretch gap-4">
        
        <!-- Logo -->
        <div class="flex-shrink-0 flex items-center justify-center">
            <img src="{{Storage::url($experience->cover)}}"
                 alt="Company Logo"
                 
                 class="w-16 h-16 object-cover rounded-lg">
        </div>

        <!-- Company Info -->
        <div class="flex-1 flex flex-col justify-center text-center sm:text-left">
            <p class="font-bold text-lg">{{$experience->name}}</p>
            <p class="text-sm text-gray-300">{{$experience->tagline}}</p>
            <p class="text-sm text-gray-400">{{$experience->datestart}} {{$experience->dateend}}</p>
        </div>

        <!-- Actions -->
        <div class="flex flex-row gap-3 items-center">
            <p class="bg-white px-8 py-2 rounded-xl font-inter text-black ">{{$experience->status}}</p>
            <a href="{{ route('experiencedetail', $experience->slug) }}"
   class="bg-mera px-3 py-2 rounded-xl text-white font-semibold
          transition-all duration-500 ease-in-out 
          hover:bg-white hover:text-mera hover:scale-110 hover:shadow-xl hover:-translate-y-1">
  DETAILS
</a>
        </div>
    </div>
</div>
@empty
@endforelse







</div>
    @include('layot.footer')
@endsection