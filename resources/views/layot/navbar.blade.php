<nav class="bg-gradient-to-t from-dasar to-itam">
  <div class="text-white flex flex-wrap justify-center gap-5 py-6 px-4 font-inter font-bold text-sm md:text-base">
    <a href="{{ route('home') }}"
       class="{{ request()->routeIs('home') ? 'text-kuning' : 'hover:text-mera' }}">
       HOME
    </a>

    <a href="{{ route('experience') }}"
       class="{{ request()->routeIs('experience') ? 'text-kuning' : 'hover:text-mera' }}">
       EXPERIENCE
    </a>

    <a href="{{ route('project') }}"
       class="{{ request()->routeIs('project') ? 'text-kuning' : 'hover:text-mera' }}">
       PROJECT
    </a>

    <a href="{{ route('certificate') }}"
       class="{{ request()->routeIs('certificate') ? 'text-kuning' : 'hover:text-mera' }}">
       CERTIFICATION
    </a>

    <a href="{{ route('about') }}"
       class="{{ request()->routeIs('about') ? 'text-kuning' : 'hover:text-mera' }}">
       ABOUT
    </a>

    <a href="{{ route('hire') }}"
       class="{{ request()->routeIs('hire') ? 'text-kuning' : 'hover:text-mera' }}">
       HIRE
    </a>
  </div>
</nav>
