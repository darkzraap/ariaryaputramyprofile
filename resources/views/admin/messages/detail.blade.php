@extends('admin.layouts.app')

@section('title', 'View & Edit Message')

@section('content')


{{-- Header Section --}}
<header class="bg-gradient-to-r from-purple-600 to-pink-600 py-16 shadow-xl mt-8 rounded-lg">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white leading-tight tracking-tight drop-shadow-md">
            Message from <span class="text-purple-200 block mt-2">{{ $message->name }}</span>
        </h1>
        <p class="mt-3 text-base text-purple-100 max-w-2xl mx-auto">
            Review the details below and make any necessary changes.
        </p>
    </div>
</header>

{{-- Main Content Area --}}
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Back to List Button -->
    <div class="mb-8">
        <a href="{{ route('admin.messages') }}" class="inline-flex items-center gap-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 font-semibold py-2 px-4 rounded-lg shadow-sm transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            Back to Message List
        </a>
    </div>

    {{-- The Form for Showing and Editing Data --}}
    <form action=" {{route('admin.messages.update', $message)}} " method="POST" class="bg-white dark:bg-gray-800 shadow-2xl rounded-xl overflow-hidden">
        @csrf
        @method('PUT') {{-- This is crucial for telling Laravel it's an update operation --}}
        
        <div class="p-8 space-y-6">
            
            {{-- Non-Editable Meta Information --}}
            <div class="border-b dark:border-gray-700 pb-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Message Details</h2>
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    <p><strong>Received:</strong> {{ $message->created_at->format('M d, Y \a\t h:i A') }}</p>
                    <p><strong>Last Updated:</strong> {{ $message->updated_at->diffForHumans() }}</p>
                </div>
            </div>

            {{-- Form Fields --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Sender Name</label>
                    <input type="text" id="name" name="name" 
                           value="{{ old('name', $message->name) }}"
                           class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                </div>
                
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Sender Email</label>
                    <input type="email" id="email" name="email" 
                           value="{{ old('email', $message->email) }}"
                           class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                </div>
                 <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Sender Phone Number</label>
                    <input type="text" id="phone" name="phone" 
                           value="{{ old('phone', $message->phone) }}"
                           class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                </div>

                  <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Project Type</label>
                    <input type="text" id="project" name="project" 
                           value="{{ old('project', $message->project) }}"
                           class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                </div>

                <!-- Location Field -->
                <div class="md:col-span-2">
                    <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Location</label>
                    <input type="text" id="location" name="location" 
                           value="{{ old('location', $message->location) }}"
                           class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                </div>

                <!-- Message Body Field -->
                <div class="md:col-span-2">
                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Message</label>
                    <textarea id="message" name="message" rows="8"
                              class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">{{ old('message_body', $message->message) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Form Footer with Submit Button --}}
        <div class="bg-gray-50 dark:bg-gray-900 px-8 py-4 flex justify-end">
            <button type="submit"
                    class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-8 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                Save Changes
            </button>
        </div>
    </form>
</div>

@endsection