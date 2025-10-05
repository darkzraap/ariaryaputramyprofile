@extends('admin.layouts.app')
@section('title', 'CMS Project List')

@section('content')

{{-- Header Section --}}
<section class="bg-gradient-to-r from-purple-600 to-pink-600 py-24 md:py-32 flex items-center justify-center flex-col gap-8 shadow-2xl">
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-white text-center leading-tight drop-shadow-xl">
        ADD <span class="text-pink-300">YOUR</span> PROJECT SCREENSHOTS
    </h1>
    <p class="font-bold text-4xl text-white drop-shadow-lg tracking-wide">{{$project->name}}</p>
</section>

{{-- Upload Form Section --}}
<section class="container mx-auto px-4 mt-12 mb-20">
    <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-8 md:p-12 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
        <form action="{{ route('admin.project.assign.screenshot.store', $project) }}" enctype="multipart/form-data" method="POST" class="flex flex-col items-center gap-6">
            @csrf
            <div class="w-full">
                <label for="screenshot" class="block text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Upload Your Screenshot
                </label>
                <div class="flex items-center justify-center w-full">
                    <label for="screenshot" class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 text-center"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 text-center">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="screenshot" type="file" name="screenshot" class="hidden" />
                    </label>
                </div>
            </div>
            <button type="submit" class="w-full px-6 py-3 text-lg font-bold text-white bg-green-500 hover:bg-green-600 transition duration-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                Upload Screenshot
            </button>
        </form>
    </div>
</section>



<section class="container mx-auto px-4 my-12">
    @forelse($project->screenshots as $screenshot)
        <ul class="space-y-4">
            <li class="flex items-center gap-4 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 transition-transform hover:scale-[1.01]">
                <div class="flex-shrink-0 w-24 h-24 sm:w-32 sm:h-32 rounded-lg overflow-hidden">
                    <img src="{{ Storage::url($screenshot->screenshot) }}" alt="Project Screenshot" class="w-full h-full object-cover">
                </div>
                <div class="flex-grow">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Screenshot {{ $loop->iteration }}</p>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white mt-1"></p>
                </div>

             
                <form action = '{{route('admin.project.assign.screenshot.destroy' , $screenshot->id)}}' method = 'POST' enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                <button class="flex-shrink-0 px-4 py-2 text-sm font-semibold text-white bg-red-500 hover:bg-red-600 transition duration-300 rounded-lg shadow-md">
                    Remove
                </button>
            </li>
        </ul>
    @empty
        <div class="text-center text-gray-500 dark:text-gray-400 py-12">
            <p class="text-xl font-medium">No screenshots have been added yet.</p>
            <p class="mt-2">Upload your first screenshot above!</p>
        </div>
    @endforelse
</section>

@endsection