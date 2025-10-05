@extends('admin.layouts.app')

@section('title', 'CMS Message List')

@section('content')

{{-- Header Section --}}
<header class="bg-gradient-to-r from-purple-600 to-pink-600 py-16 md:py-24 shadow-xl mt-8 rounded-lg">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-white leading-tight tracking-tight drop-shadow-md">
            Incoming <span class="text-purple-200">Messages</span>
        </h1>
        <p class="mt-4 text-lg text-purple-100 max-w-2xl mx-auto">
            Review and manage all messages submitted through your contact form.
        </p>
    </div>
</header>

{{-- Main Content Area --}}
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

  

    <div class="space-y-6">
        {{-- Loop through messages. @forelse handles the case where the list is empty --}}
        @forelse ($messages as $message)
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden transition-transform duration-300 hover:scale-[1.02] hover:shadow-2xl">
                <div class="p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    
                    {{-- Left Side: User Info --}}
                    <div class="flex-shrink-0">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ $message->name }}</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $message->email }}</p>
                    </div>

                    {{-- Middle: Meta Info (Location & Timestamp) --}}
                    <div class="flex-grow flex flex-col sm:flex-row sm:items-center sm:justify-start md:justify-center gap-x-8 gap-y-2 text-sm text-gray-600 dark:text-gray-300">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            <span>{{ $message->location }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.414-1.414L11 9.586V6z" clip-rule="evenodd" />
                            </svg>
                            {{-- diffForHumans() is much more user-friendly --}}
                            <span>{{ $message->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    {{-- Right Side: Action Buttons --}}
                    <div class="flex-shrink-0 mt-4 md:mt-0">
                        {{-- We wrap the buttons in a flex container to align them horizontally --}}
                        <div class="flex items-center gap-x-4">
                            <a href="{{route('admin.messages.edit', $message)}}" 
                               class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-5 rounded-lg shadow-md transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Details
                            </a>
                            
                            <form action="{{route('admin.messages.destroy', $message)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-5 rounded-lg shadow-md transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @empty
            {{-- This block runs if the $messages collection is empty --}}
            <div class="text-center py-16 bg-gray-50 dark:bg-gray-800 rounded-lg">
                <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200">No Messages Found</h3>
                <p class="text-gray-500 dark:text-gray-400 mt-2">There are currently no messages to display.</p>
            </div>
        @endforelse
    </div>
</div>

@endsection