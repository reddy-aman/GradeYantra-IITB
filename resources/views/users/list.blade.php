<x-app-layout>
<div class="p-4 sm:ml-64" style="margin-top: 5%;">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 bg-white">
   <div class="mb-5 mt-3">
   <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Users Table<a class="text-blue-700" href=""></a>
    </h2>
    </div>
   
   <x-message></x-message>
   <table id="search-table">
    <thead>
        <tr>
            <th>
                <span class="flex items-center">
                ID
                </span>
            </th>
            <th>
                <span class="flex items-center">
                User Name
                </span>
            </th>
            <th>
                <span class="flex items-center">
                Email
                </span>
            </th>
            <th>
                <span class="flex items-center">
                Assigned Role
                </span>
            </th>
            <th>
                <span class="flex items-center">
                Creation Date
                </span>
            </th>
            <th>
                <span class="flex items-center">
                Action
                </span>
            </th>
        </tr>
    </thead>
    <tbody>
    @if ($users->isNotEmpty())
    @foreach ($users as $user)
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->roles->pluck('name')->implode(',')}}</td>
            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</td>
            <td> 
            <a class="rounded text-sm bg-slate-700 px-3 py-2 text-white" href="{{route("users.edit",parameters: $user->id)}}">Edit</a>
            </td>
        </tr>
    @endforeach
    @else
    <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">No users available.</td>
    </tr>
    @endif
    </tbody>
</table>
</div>
</div>

</x-app-layout>
<script>

if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
    const dataTable = new simpleDatatables.DataTable("#search-table", {
        searchable: true,
        sortable: false
    });
}

</script>
