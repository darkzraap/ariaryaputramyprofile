@extends('admin.layouts.app')
@section('title', 'Create New Project')

@section('content')

<section class="bg-gradient-to-r from-purple-500 to-pink-500 h-40 flex items-center justify-center shadow-lg">
    <h1 class="text-6xl md:text-7xl font-extrabold text-white text-center">
        ADD <span class="text-pink-800 drop-shadow-lg">NEW</span> TOOLS
    </h1>
</section>

<div class="container mx-auto px-4 py-12">
    <form action="{{ route('admin.tool.store') }}" enctype="multipart/form-data" method="POST"
        class="space-y-12">
        @csrf

        <section class="bg-gray-800 p-8 md:p-12 rounded-2xl shadow-2xl space-y-8">
            <h2 class="text-3xl font-bold text-white mb-6 border-b-2 border-purple-500 pb-2">Add New Tools</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="flex flex-col">
                    <label for="name" class="text-gray-300 font-semibold mb-2">Tool Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full bg-gray-700 text-white border border-gray-600 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300 placeholder-gray-400"
                        placeholder="Tool Name">
                    @error('name')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="tagline" class="text-gray-300 font-semibold mb-2">Tagline</label>
                    <input type="text" id="tagline" name="tagline" value="{{ old('tagline') }}"
                        class="w-full bg-gray-700 text-white border border-gray-600 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300 placeholder-gray-400"
                        placeholder="A short, catchy phrase">
                    @error('tagline')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div> </section>

        <section class="bg-gray-800 p-8 md:p-12 rounded-2xl shadow-2xl space-y-8">
            <h2 class="text-3xl font-bold text-white mb-6 border-b-2 border-purple-500 pb-2">Description & Media</h2>

            <div class="flex flex-col">
                <label for="description" class="text-gray-300 font-semibold mb-2">Description</label>
                <textarea id="description" name="description" rows="6"
                    class="w-full bg-gray-700 text-white border border-gray-600 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300 placeholder-gray-400"
                    placeholder="Tell your tool">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="cover" class="text-gray-300 font-semibold mb-2">Upload Cover Image</label>
                <div class="relative flex items-center justify-center border-2 border-dashed border-gray-600 rounded-lg p-6 hover:border-purple-500 transition-colors duration-300 cursor-pointer">
                    <input type="file" id="logo" name="logo" accept="image/*"
                        class="absolute inset-0 opacity-0 cursor-pointer">
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v8" />
                        </svg>
                        <p class="mt-2 text-sm text-gray-400">
                            <span class="font-semibold text-purple-400">Click to upload</span> or drag and drop
                        </p>
                        <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div>
                @error('logo')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
        </section>

        <div class="flex justify-center">
            <button type="submit"
                class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-4 px-12 rounded-full shadow-lg transform transition-transform duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-500 focus:ring-opacity-50">
                SUBMIT NEW TOOL
            </button>
        </div>
    </form>
</div>
@endsection