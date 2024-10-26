<x-app-layout>
<div class="p-4 sm:ml-64" style="margin-top: 5%;">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 bg-white">
   <div class="flex justify-between mb-5 mt-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               View {{ __('Permissions') }} Table
            </h2>
            <a class="rounded text-sm bg-slate-700 px-4 py-2 text-white" href="{{ route('permissions.create') }}">Create</a>
        </div>
   <x-message></x-message>
   <table id="pagination-table">
    <thead>
        <tr>
            <th>
                <span class="flex items-center">
                ID
                </span>
            </th>
            <th>
                <span class="flex items-center">
                Permission Name
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
    @if ($permissions->isNotEmpty())
    @foreach ($permissions as $permission)
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $permission->id }}</td>
            <td>{{ $permission->name }}</td>
            <td>{{ \Carbon\Carbon::parse($permission->created_at)->format('d M Y') }}</td>
            <td> 
            <a class="rounded text-sm bg-slate-700 px-3 py-2 text-white" href="{{route("permissions.edit",$permission->id)}}">Edit</a>
            <a class="rounded text-sm bg-red-700 px-3 py-2 text-white ml-5" href="javascript:void(0);" onclick="deletePermissions({{$permission->id}})">Delete</a>
            </td>
        </tr>
    @endforeach
    @else
    <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">No permissions available.</td>
    </tr>
    @endif
    </tbody>
</table>
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
// DataTable
if (document.getElementById("pagination-table") && typeof simpleDatatables.DataTable !== 'undefined') {
    const dataTable = new simpleDatatables.DataTable("#pagination-table", {
        paging: true,
        perPage: 5,
        perPageSelect: [5, 10, 15, 20, 25],
        sortable: false
    });
}

</script>

</x-slot>
</x-app-layout>


