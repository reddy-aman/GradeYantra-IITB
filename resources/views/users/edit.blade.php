<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        users
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">    
                    <form action="{{route('users.update',$user->id)}}" method="post">
                    @csrf
                    <div class="mb-5">
                        <label for="base-input" class="block mb-4 text-lg font-medium text-gray-900 dark:text-white"> Name </label>
                        <input type="text" name="name" value="{{old('name',$user->name)}}" placeholder="name" class=" text-sm rounded-lg  w-2/12 ">
                        @error('name')
                        <p class="text-red-700 font-medium">{{$message}}</p>
                        @enderror
                    </div>   
                    <div class="mb-5">
                        <label for="base-input" class="block mb-4 text-lg font-medium text-gray-900 dark:text-white"> Email </label>
                        <input type="email" name="email" value="{{old('name',$user->email)}}" placeholder="email" class=" text-sm rounded-lg  w-2/12 ">
                        @error('name')
                        <p class="text-red-700 font-medium">{{$message}}</p>
                        @enderror
                    </div>   

                    <div class="grid grid-cols-4 mb-3">
                    <h1>Assigne Role <span class="text-red-700">*</span> </h1>
                     @if ($roles->isNotEmpty())
                     @foreach ($roles as $role)
                     <div class="mt-3">
                   <input {{($hasRoles->contains($role->id)) ? 'checked' : ''}} type="checkbox" id="role-{{$role->id}}" class="rounded" name="role[]" value="{{$role->name}}">
                   <label for="role-{{$role->id}}">{{$role->name}}</label>
                     </div>
                     
                     @endforeach
                     
                     @endif
                    </div>
                    <button class="rounded text-sm bg-slate-700 px-4  py-3 text-white">Update</button>              
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
