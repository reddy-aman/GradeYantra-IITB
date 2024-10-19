<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Permissions') }}
            </h2>
            <a class="rounded text-sm bg-slate-700 px-4 py-2 text-white" href="{{ route('permissions.create') }}">Create</a>
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
                                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Permission Name</th>
                                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Creation Date</th>
                                                <th scope="col" class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                            @if ($permissions->isNotEmpty())
                                                @foreach ($permissions as $permission)
                                                    <tr>
                                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">{{ $permission->id }}</td>
                                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-800">{{ $permission->name }}</td>
                                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-800">{{ \Carbon\Carbon::parse($permission->created_at)->format('d M Y') }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                            <a class="rounded text-sm bg-slate-700 px-3 py-2 text-white" href="{{route("permissions.edit",$permission->id)}}">Edit</a>
                                                            <a class="rounded text-sm bg-red-700 px-3 py-2 text-white" href="javascript:void(0);" onclick="deletePermissions({{$permission->id}})">Delete</a>
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
                                                {{ $permissions->links('vendor.pagination.custom-pagination') }}
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
    function deletePermissions(id) {
        if (confirm("Are you sure you want to delete?")) {
            $.ajax({
                url: '{{ route("permissions.destroy", ":id") }}'.replace(':id', id),  // Replace the :id placeholder with the actual ID
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'x-csrf-token': '{{ csrf_token() }}'  // Include CSRF token for security
                },
                success: function(response) {
                    if (response.status) {
                        window.location.href = '{{ route("permissions.index") }}';  // Redirect to index after deletion
                    } else {
                        alert('Failed to delete permission.');
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
