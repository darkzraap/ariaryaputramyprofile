@extends('layot.apps')
@section('title', 'Hire Me | MyProfile')
@include('layot.navbar')

@section('content')
<div class="bg-gradient-to-t from-itam to-dasar min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8">

    <!-- Title -->
    <div class="text-center mb-12">
        <h1 class="text-white font-inter font-bold text-5xl sm:text-6xl mb-4">Get In Touch!</h1>
        <p class="text-white font-inter text-base sm:text-lg leading-relaxed max-w-3xl mx-auto">
            Feel free to send me a message below to discuss your ideas, projects, or potential collaborations. I’d be happy to connect and explore how we can work together.
        </p>
    </div>

    <!-- Form Section -->
    <section class="flex flex-col lg:flex-row items-center gap-10 max-w-6xl w-full">

        <!-- Left Image -->
        <div class="flex justify-center w-full lg:w-1/2">
            <img src="{{ asset('images/hirebg.png') }}" alt="Hire Me" class="w-full max-w-[40rem] rounded-xl shadow-lg object-cover">
        </div>

        <!-- Right Form -->
        <div class="bg-mera w-full lg:w-1/2 rounded-2xl p-8 shadow-lg">
           <form action="{{ route('hire.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-white font-semibold mb-2">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full px-4 py-3 rounded-lg bg-white/10 text-white placeholder-gray-300 border border-white/20 focus:outline-none focus:ring-2 focus:ring-white/40"
                        placeholder="Your full name">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-white font-semibold mb-2">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-3 rounded-lg bg-white/10 text-white placeholder-gray-300 border border-white/20 focus:outline-none focus:ring-2 focus:ring-white/40"
                        placeholder="you@example.com">
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-white font-semibold mb-2">Location</label>
                    <input type="text" id="location" name="location" value="{{ old('location') }}"
                        class="w-full px-4 py-3 rounded-lg bg-white/10 text-white placeholder-gray-300 border border-white/20 focus:outline-none focus:ring-2 focus:ring-white/40"
                        placeholder="Your city or country">
                </div>

                <!-- Project Type -->
                <div>
                    <label for="project" class="block text-white font-semibold mb-2">Project Type</label>
                    <select id="project" name="project"
                        class="w-full px-4 py-3 rounded-lg bg-black text-white border border-white/20 focus:outline-none focus:ring-2 focus:ring-white/40 appearance-none">
                        <option value="" disabled {{ old('project') ? '' : 'selected' }} class="text-gray-400">Choose Project</option>
                        <option value="Website Development" {{ old('project') == 'Website Development' ? 'selected' : '' }}>Website Development</option>
                        <option value="Data Administration" {{ old('project') == 'Data Administration' ? 'selected' : '' }}>Data Administration</option>

                        <option value="Other" {{ old('project') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-white font-semibold mb-2">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                        class="w-full px-4 py-3 rounded-lg bg-white/10 text-white placeholder-gray-300 border border-white/20 focus:outline-none focus:ring-2 focus:ring-white/40"
                        placeholder="+62 812 3456 7890">
                </div>

                <!-- Message -->
                <div>
                    <label for="message" class="block text-white font-semibold mb-2">Your Message</label>
                    <textarea id="message" name="message" rows="5"
                        class="w-full px-4 py-3 rounded-lg bg-white/10 text-white placeholder-gray-300 border border-white/20 focus:outline-none focus:ring-2 focus:ring-white/40"
                        placeholder="Write your message here..."></textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center pt-4">
                    <button type="submit"
                        class="bg-white text-mera font-bold text-lg py-3 px-8 rounded-full hover:bg-transparent hover:text-white border-2 border-white transition-all duration-300">
                        Send Message
                    </button>
                </div>
            </form>
        </div>

    </section>
</div>

@include('layot.footer')
@endsection
