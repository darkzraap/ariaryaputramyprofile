<div class="fixed top-0 left-0 right-0 z-50 flex justify-center bg-transparent">
  <div class="px-[10rem] w-[70rem] rounded-[50rem] p-4 flex items-center justify-between bg-black mt-6 shadow-lg">
    
    <!-- Left: Logo / Brand -->
    <div class="bg-white rounded-xl px-5 flex items-center py-3">
      <span class="text-sm text-black font-semibold">MyProfile Cms</span>
    </div>

    <!-- Right: Navigation Links + Logout -->
    <div class="flex items-center gap-8 font-semibold">
      <a href="{{route('admin.owner.index')}}" 
         class="text-[15px] text-white font-semibold hover:text-blue-500 
                {{ request()->routeIs('admin.owner.index') ? '!text-blue-500' : '' }}">
        OWNER
      </a>
      <a href="{{route('admin.project.index')}}" 
         class="text-[15px] text-white font-semibold hover:text-blue-500 
                {{ request()->routeIs('admin.project.index') ? '!text-blue-500' : '' }}">
        PROJECT
      </a>
      <a href="{{route('admin.experience.index')}}" 
         class="text-[15px] text-white font-semibold hover:text-blue-500 
                {{ request()->routeIs('admin.experience.index') ? '!text-blue-500' : '' }}">
        EXPERIENCES
      </a>
      <a href="{{route('admin.tool.index')}}" 
         class="text-[15px] text-white font-semibold hover:text-blue-500 
                {{ request()->routeIs('admin.tool.index') ? '!text-blue-500' : '' }}">
        TOOL
      </a>
      <a href="{{route('admin.certificate.index')}}" 
         class="text-[15px] text-white font-semibold hover:text-blue-500 
                {{ request()->routeIs('admin.certificate.index') ? '!text-blue-500' : '' }}">
        CERTIFICATE
      </a>

      <a href="{{route('admin.messages')}}" 
         class="text-[15px] text-white font-semibold hover:text-blue-500 
                {{ request()->routeIs('admin.messages') ? '!text-blue-500' : '' }}">
        MESSAGES
      </a>


      <!-- Logout Form -->
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-[15px] text-white hover:text-red-500 font-semibold focus:outline-none">
          LOGOUT
        </button>
      </form>
    </div>
  </div>
</div>
