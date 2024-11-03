{{-- side bar --}}
<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">

<aside id="logo-sidebar"
   class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
   aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="{{route('instructor.dashboard')}}"
               class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <i class="fa fa-tasks" aria-hidden="true"></i>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="#"
               class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <i class="fa fa-file-text" aria-hidden="true"></i>
               <span class="ms-3">Assignments</span>
            </a>
         </li>
         <li>
            <a href="#"
               class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <i class="fa fa-users" aria-hidden="true"></i>
               <span class="ms-3">Roster</span>
            </a>
         </li>
         <li>
            <a href="#"
               class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <i class="fa fa-clock-o fa-lg" aria-hidden="true"></i>
               <span class="ms-3">Extensions</span>
            </a>
         </li>
         <li>
            <a href="#"
               class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <i class="fa fa-cog fa-lg" aria-hidden="true"></i>
               <span class="ms-3">Course Settings</span>
            </a>
         </li>
         <li>
            <button type="button"
               class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
               aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
               <i class="fa fa-cogs fa-lg" aria-hidden="true"></i>
               <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Admin</span>
              <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </button>
            <ul id="dropdown-example" class="hidden py-2 space-y-2">
               <li>
                  <a href="{{route('permissions.create')}}"
                     class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                     <span class="flex-1 ms-3 whitespace-nowrap">{{ __('Create Permissions') }}</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('permissions.index')}}"
                     class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                     <span class="flex-1 ms-3 whitespace-nowrap">{{ __('View Permissions') }}</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('Roles.create')}}"
                     class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                     <span class="flex-1 ms-3 whitespace-nowrap">{{ __('Create Roles') }}</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('Roles.index')}}"
                     class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                     <span class="flex-1 ms-3 whitespace-nowrap"> {{ __('View Roles') }}</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('users.index')}}"
                     class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                     <span class="flex-1 ms-3 whitespace-nowrap"> {{ __('View Users') }} </span>
                  </a>
               </li>
            </ul>
         </li>
      </ul>
   </div>
</aside>
{{-- side bar --}}

<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
   <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
         <div class="flex items-center justify-start rtl:justify-end">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
               type="button"
               class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
               <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path clip-rule="evenodd" fill-rule="evenodd"
                     d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                  </path>
               </svg>
            </button>
            <a href="#" class="flex ms-2 md:me-24">
               <x-application-logo/>
               <span
                  class="self-center text-xl font-semibold sm:text-2xl ml-3 whitespace-nowrap dark:text-white">Mulyankan</span>
            </a>
         </div>
         <div class="flex items-center">
            <div class="flex items-center ms-3">

               <button type="button" class="flex text-sm" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                  <p class="text-sm text-gray-900 dark:text-white" role="none">
                     {{ Auth::user()->name }} ({{ Auth::user()->roles->pluck('name')->implode(',') }})
                  </p>
               </button>

               <button id="theme-toggle" type="button"
                  class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                  <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                     <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                  </svg>
                  <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                     <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                  </svg>
               </button>

               <div
                  class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                  id="dropdown-user">
                  <ul class="py-1" role="none">
                     <li>
                        <a href="{{route('auth.change-password')}}"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                           role="menuitem">Change Password</a>
                     </li>
                     <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <li>
                           <a href="#"
                              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                              role="menuitem" onclick="event.preventDefault(); this.closest('form').submit();">
                              {{ __('Log Out') }}
                           </a>
                        </li>
                     </form>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</nav>


{{-- dark mode --}}

<script>

   var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
   var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

   // Change the icons inside the button based on previous settings
   if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      themeToggleLightIcon.classList.remove('hidden');
   } else {
      themeToggleDarkIcon.classList.remove('hidden');
   }

   var themeToggleBtn = document.getElementById('theme-toggle');

   themeToggleBtn.addEventListener('click', function () {

      // toggle icons inside button
      themeToggleDarkIcon.classList.toggle('hidden');
      themeToggleLightIcon.classList.toggle('hidden');

      // if set via local storage previously
      if (localStorage.getItem('color-theme')) {
         if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
         } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
         }

         // if NOT set via local storage previously
      } else {
         if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
         } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
         }
      }

   });
</script>