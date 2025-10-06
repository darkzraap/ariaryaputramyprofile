<!-- Footer -->
<section class="bg-black text-white py-12">
  <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    
    <!-- Left Side -->
    <div class="flex flex-col gap-4 max-w-sm">
      <a href="{{ route('home') }}" class="font-bold text-3xl text-kuning">MYPROFILE</a>
      <p class="font-semibold font-inter text-sm leading-relaxed">
        We provide the best websites for your portfolio with excellent service.
      </p>
      <a href="#top"
         class="bg-white rounded-lg flex flex-row items-center justify-center gap-3 px-4 py-2 w-fit hover:bg-gray-200 transition">
        <img src="{{ asset('images/nex.png') }}" class="w-6 h-6" alt="Back Icon">
        <span class="font-bold text-black">Back To Top</span>
      </a>
    </div>

    <!-- Right Side -->
    <div class="flex flex-col">
      <h3 class="font-bold text-2xl mb-4 hover:text-mera cursor-default">Pages</h3>
      <div class="flex flex-col gap-2 text-sm">
        <a href="{{route('about')}}" class="hover:text-mera">About</a>
        <a href="{{route('experience')}}" class="hover:text-mera">Experience</a>
        <a href="{{route('project')}}" class="hover:text-mera">Project</a>
        <a href="{{route('certificate')}}" class="hover:text-mera">Certificate</a>
        <a href="{{route('hire')}}" class="hover:text-mera">Hire Me Form</a>
      </div>
    </div>

  </div>
</section>

<!-- Copyright -->
<section class="bg-white border-t py-4">
  <div class="container mx-auto px-4">
    <p class="text-center text-gray-700 text-sm md:text-base">
      © 2025 <span class="font-semibold">ariaryaputra</span>. All Rights Reserved.
    </p>
  </div>
</section>
