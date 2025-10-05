@extends('admin.layouts.app')
@section('title', 'CMS Owner')

@section('content')


       @if($owners2 > 0)


            <div class = 'flex justify-center'>
            <h1 class = 'font-semibold text-[5rem] mt-[3rem] text-white mb-5'> Welcome to CMS <span class = 'text-red-500'>MyProfile</span></h1>
            
            </div>



@forelse($owners as $owner)


        <div class = 'flex flex-col justify-center items-center gap-3'>

                    <img src = {{Storage::url($owner->pict)}} class =  'rounded-lg w-[15rem]'>
                    <p class = 'text-white font-semibold text-[2rem]'>{{$owner->name}}</p>
                    <span class ='mt-[-1rem] text-gray-300'>{{$owner->tagline}}</span>

     
                     <div class = 'flex gap-5'>
           <a href = '{{route('admin.owner.edit', $owner)}} ' class ='bg-black text-white font-semibold py-2 px-6 rounded hover:bg-gray-300 hover:text-black'>Edit</a>
           <form action = {{route('admin.owner.destroy', $owner)}} enctype="multipart/form-data" method = 'POST' >
              @csrf
              @method('DELETE')
              <button type  ='submit' class ='bg-red-600 text-white font-semibold py-2 px-6 rounded hover:bg-gray-300 hover:text-black'>Delete</button>
           </form>
                     </div>
    </div>
           @empty
@endforelse

@else
<div class = 'flex justify-center mt-2'>
<a href = '{{route('admin.owner.create')}}' class ='bg-white text-black text-[15px] font-semibold mt-10 hover:bg-gray-300 hover:text-black  p-5 rounded-xl'>Create Profile</a>
            </div>

            <div class = 'flex justify-center'>
            <h1 class = 'font-semibold text-[5rem] mt-[3rem] text-white'> Welcome to CMS <span class = 'text-red-500'>MyProfile</span></h1>
            
           
            </div>
            <h1 class = 'font-semibold text-[2rem] mt-[3rem] text-gray-300 text-center'> No Profile Found!</h1>

@endif


@endsection