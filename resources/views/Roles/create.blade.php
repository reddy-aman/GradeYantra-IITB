<x-app-layout>
<div class="p-4 sm:ml-64" style="margin-top: 5%;">
<div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 bg-white">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Roles /<a class="text-blue-700" href="{{route('Roles.index')}}">View</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">    
                    <form action="{{route('Roles.store')}}" method="post">
                    @csrf
                    <div class="mb-5">
                        <label for="base-input" class="block mb-4 text-lg font-medium text-gray-900 dark:text-white">Create Roles </label>
                        <input type="text" name="name" value="{{old('name')}}" placeholder="Enter Role Name" class=" text-sm rounded-lg  w-5/12 ">
                        @error('name')
                        <p class="text-red-700 font-medium">{{$message}}</p>
                        @enderror
                    </div>   
                    <div class="grid grid-cols-4 mb-3">
                    <h1 class="text-red-700  font-medium mb-4"> Assign Permissions to Role </h1>
                     @if ($permissions->isNotEmpty())
                     @foreach ($permissions as $permission)
                     <div class="mt-3">
                   <input type="checkbox" id="permission-{{$permission->id}}" class="rounded" name="permission[]" value="{{$permission->name}}">
                   <label for="permission-{{$permission->id}}">{{$permission->name}}</label>
                     </div>
                     
                     @endforeach
                     
                     @endif
                    </div>
                    <button class="rounded text-sm bg-slate-700 px-4  mt-2 py-3 text-white">Submit</button>              
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
