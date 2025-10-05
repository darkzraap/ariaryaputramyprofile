@extends('admin.layouts.app')
@section('title', 'CMS Project List')

@section('content')

{{-- Header Section --}}
<section class="bg-gradient-to-r from-purple-500 to-pink-500 py-20 md:py-32 flex items-center justify-center shadow-2xl mt-8 flex-col gap-8">
    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-extrabold text-white text-center leading-tight drop-shadow-lg">
        LIST <span class="text-pink-800">YOUR</span> TOOLS
    </h1>
    <div>
        <p class="font-bold text-[3rem] text-white">{{ $project->name }}</p>
    </div>
</section>

{{-- Form Section --}}
<section class="bg-gray-800 px-4 py-12">
    <div class="flex flex-col justify-center items-center">
        <form action="{{ route('admin.project.assign.tool.store', $project) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-3xl">
            @csrf

            {{-- Label --}}
            <div class="flex flex-col items-center mb-6">
                <label for="tool_id" class="text-white font-bold text-4xl mb-4">Add Tool For</label>

            
                <img src = '{{Storage::url($project->cover)}}' class = 'w-[15rem] mb-3'>
                <p class = 'text-white font-semibold '>{{$project->name}}</p>

            
            </div>

                {{-- Dropdown --}}
                <select id="tool_id" name="tool_id" class="w-full p-3 rounded border border-gray-300 focus:outline-none">
                    <option value="" disabled selected>Choose</option>
                    @forelse ($tools as $tool)
                        <option value="{{ $tool->id }}">{{ $tool->name }}</option>
                    @empty
                        <option disabled>No tools available</option>
                    @endforelse
                </select>
            </div>

            {{-- Submit Button --}}
            <div class="flex justify-center">
                <button type="submit" class="bg-yellow-500 text-white font-semibold py-3 px-6 rounded-full text-sm shadow-lg hover:bg-yellow-600 transition-colors duration-300 mt-3">
                    Submit
                </button>
            </div>
        </form>
    </div>
</section>

@forelse($project->tools as $tool)

<section class="bg-gray-800 px-4 py-12">
        <div class = '  flex flex-row justify-center items-center gap-8'>
    <img src = '{{Storage::url($tool->logo)}}' class = 'w-[6rem] rounded-lg '>
    <p class = 'font-semibold text-[3rem] text-white'>{{$tool->name}}</p>
       
            <form action = "{{route('admin.project.assign.tool.destroy', $tool->pivot->id)}}" method = 'POST'>
                @csrf
                @method('DELETE')
    <button type ='submit' class = 'bg-red-600 px-6 py-2 rounded text-white font-semibold'>Delete</button>
     
        
        
        </form>
        </div>
</section>

 @empty
                        <option disabled>No tools available</option>
                    @endforelse

@endsection
