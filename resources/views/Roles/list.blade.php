<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Roles') }}
            </h2>
            <a class="rounded text-sm bg-slate-700 px-4 py-2 text-white" href="{{ route('Roles.create') }}">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-message></x-message>
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="border rounded-lg shadow overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">ID</th>
                                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Role Name</th>
                                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Assign Permissions</th>
                                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Creation Date</th>
                                                <th scope="col" class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                            @if ($roles->isNotEmpty())
                                                @foreach ($roles as $role)
                                                    <tr>
                                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">{{ $role->id }}</td>
                                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-800">{{ $role->name }}</td>
                                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-800" style="word-wrap: break-word; word-break: break-all; white-space: normal;">
                                                        {{ $role->permissions->pluck('name')->implode(',') }}
                                                        </td>
                                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-800">{{ \Carbon\Carbon::parse($role->created_at)->format('d M Y') }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                            <a class="rounded text-sm bg-slate-700 px-3 py-2 text-white" href="{{route("Roles.edit",parameters: $role->id)}}">Edit</a>
                                                            <a class="rounded text-sm bg-red-700 px-3 py-2 text-white" href="javascript:void(0);" onclick="deleteRoles({{$role->id}})">Delete</a>
                                                        </td>
                                                       
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No permissions available.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>

                                    <!-- Pagination part -->
                                    <div class="mt-2 text-center my-3">
                                        <ul class="inline-flex -space-x-px text-base h-10">
                                            <li>
                                                {{ $roles->links('vendor.pagination.custom-pagination') }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
    <script type="text/javascript">
    function deleteRoles(id) {
        if (confirm("Are you sure you want to delete Role ?")) {
            $.ajax({
                url: '{{ route("Roles.destroy", ":id") }}'.replace(':id', id),  // Replace the :id placeholder with the actual ID
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'x-csrf-token': '{{ csrf_token() }}'  // Include CSRF token for security
                },
                success: function(response) {
                    if (response.status) {
                        window.location.href = '{{ route("Roles.index") }}';  // Redirect to index after deletion
                    } else {
                        alert('Failed to delete Roles.');
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);  // Log server response for debugging
                }
            });
        }
    }
</script>

    </x-slot>
</x-app-layout>
