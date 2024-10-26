<x-app-layout>
<div class="p-4 sm:ml-64" style="margin-top: 5%;">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 bg-white">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Roles') }} Table
            </h2>
            <a class="rounded text-sm bg-slate-700 px-4 py-2 text-white" href="{{ route('Roles.create') }}">Create</a>
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
                Role Name
                </span>
            </th>
            <th>
                <span class="flex items-center">
                Assign Permissions
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
    @if ($roles->isNotEmpty())
    @foreach ($roles as $role)
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->permissions->pluck('name')->implode(',') }}</td>
            <td>{{ \Carbon\Carbon::parse($role->created_at)->format('d M Y') }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium"> 
            <a class="rounded text-sm bg-slate-700 px-3 py-2 text-white" href="{{route("Roles.edit",parameters: $role->id)}}">Edit</a>
            <a class="rounded text-sm bg-red-700 px-3 py-2 text-white" href="javascript:void(0);" onclick="deleteRoles({{$role->id}})">Delete</a>
            </td>
        </tr>
    @endforeach
    @else
    <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">No Roles available.</td>
    </tr>
    @endif
    </tbody>
</table>
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


