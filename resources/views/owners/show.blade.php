<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Owner Details</title>
</head>
<body class="bg-gray-100 text-gray-900">

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Owner Details</h1>

    <div class="bg-white rounded-2xl shadow-md p-6 max-w-lg mx-auto">
        <p class="mb-4"><span class="font-semibold">ID:</span> {{ $owner->id }}</p>
        <p class="mb-4"><span class="font-semibold">Name:</span> {{ $owner->name }}</p>
        <p class="mb-4"><span class="font-semibold">Email:</span> {{ $owner->email }}</p>

        <div class="mb-4">
            <p class="font-semibold mb-2">Properties ({{ $owner->properties->count() }})</p>
            <ul class="list-disc list-inside text-gray-700">
                @forelse($owner->properties as $property)
                    <li>{{ $property->title ?? 'Untitled' }} - {{ $property->city ?? 'No location' }}</li>
                @empty
                    <li>No properties found</li>
                @endforelse
            </ul>
        </div>

        <div class="flex gap-2 mt-6">
            <a href="{{ route('owners.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                Back
            </a>
            <a href="{{ route('owners.edit', $owner->id) }}"
               class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Edit
            </a>
        </div>
    </div>
</div>

</body>
</html>
