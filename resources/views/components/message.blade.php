@if (Session::has('success'))
    <div class="container mx-auto p-4 mb-4 bg-gray-50 rounded-md shadow-md">
        <p class="text-green-700 font-semibold">{{ Session::get('success') }}</p>
    </div>
@endif

@if (Session::has('error'))
    <div class="container mx-auto p-4 mb-4 bg-gray-50 rounded-md shadow-md">
        <p class="text-red-700 font-semibold">{{ Session::get('error') }}</p>
    </div>
@endif
