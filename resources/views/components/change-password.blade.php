 <!-- Success message at the top -->
 @if (session('status') === 'password-updated')
       
       <div class="container mx-auto p-4 mb-4 bg-gray-50 rounded-md shadow-md">
           <p 
               class="text-green-700 font-semibold"  x-data="{ show: true }"
               x-show="show"
               x-transition
               x-init="setTimeout(() => show = false, 3000)"  
               >
               {{ __('Password change successful.') }}
           </p>
       </div>
      
       @endif