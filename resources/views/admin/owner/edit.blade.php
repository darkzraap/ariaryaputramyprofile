@extends('admin.layouts.app')
@section('title', 'CMS Edit Profile')

@section('content')

{{-- Header Section --}}
<section class="w-full bg-gradient-to-r from-purple-500 to-pink-500 py-20 md:py-32 flex items-center justify-center shadow-2xl">
    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-extrabold text-white text-center leading-tight drop-shadow-lg">
        Edit Your <span class="text-pink-800">Profile</span>
    </h1>
</section>

{{-- Form Section --}}
<section class="Form container mx-auto px-4 py-12 md:py-20">

    <div class="bg-gray-800 p-8 md:p-12 rounded-2xl shadow-2xl space-y-8 max-w-4xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-white border-b-2 border-purple-500 pb-2">Profile Details</h2>
            <a href="{{ route('admin.owner.index') }}" 
               class="bg-black text-white font-semibold py-2 px-6 rounded-lg 
                      hover:bg-gray-700 transition-colors duration-300">
                Back
            </a>
        </div>

        <form action="{{ route('admin.owner.update', $owner) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')
            
            {{-- Profile Fields --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Name Field --}}
                <div>
                    <label for="name" class="block text-lg md:text-xl font-semibold text-gray-300 mb-2">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $owner->name) }}"
                           class="w-full bg-gray-700 text-white rounded-lg px-4 py-3 
                                  focus:outline-none focus:ring-2 focus:ring-pink-500 transition-colors duration-300">
                    @error('name')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tagline Field --}}
                <div>
                    <label for="tagline" class="block text-lg md:text-xl font-semibold text-gray-300 mb-2">Tagline</label>
                    <input type="text" id="tagline" name="tagline" value="{{ old('tagline', $owner->tagline) }}"
                           class="w-full bg-gray-700 text-white rounded-lg px-4 py-3 
                                  focus:outline-none focus:ring-2 focus:ring-pink-500 transition-colors duration-300">
                    @error('tagline')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- About Field --}}
            <div>
                <label for="about" class="block text-lg md:text-xl font-semibold text-gray-300 mb-2">About</label>
                <textarea id="about" name="about" rows="6"
                          class="w-full bg-gray-700 text-white rounded-lg px-4 py-3 
                                 focus:outline-none focus:ring-2 focus:ring-pink-500 transition-colors duration-300">{{ old('about', $owner->about) }}</textarea>
                @error('about')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Profile Picture Upload Field --}}
            <div>
                <label for="pict" class="block text-lg md:text-xl font-semibold text-gray-300 mb-2">Profile Picture</label>
                @if ($owner->pict)
                    <div class="mb-4">
                        <p class="text-sm text-gray-400 mb-2">Current Picture:</p>
                        <img src="{{ Storage::url($owner->pict) }}" alt="Profile Picture" class="w-32 h-32 object-cover rounded-lg shadow-md border-2 border-gray-600">
                    </div>
                @endif
                <input type="file" name="pict" id="pict" accept="image/*"
                       class="block w-full text-white file:mr-4 file:py-2 file:px-6 
                              file:rounded-full file:border-0 file:text-sm file:font-semibold 
                              file:bg-pink-500 file:text-white hover:file:bg-pink-600 
                              transition duration-300 ease-in-out"/>
                @error('pict')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="flex justify-center mt-8">
                <button type="submit" 
                        class="bg-pink-600 text-white font-bold py-3 px-10 rounded-full shadow-lg
                               transform transition-transform duration-300 hover:scale-105
                               focus:outline-none focus:ring-4 focus:ring-pink-500 focus:ring-opacity-50">
                    UPDATE PROFILE
                </button>
            </div>
        </form>
    </div>
</section>

@endsection
