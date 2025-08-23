<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Owners</title>
</head>
<body class="bg-gray-100 text-gray-900">

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Owners</h1>

    <div class="overflow-x-auto bg-white rounded-2xl shadow">
        <table class="min-w-full text-left text-sm">
            <thead class="bg-gray-200 text-gray-700 uppercase text-xs">
            <tr>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Email</th>
                <th class="px-6 py-3">Properties</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($owners as $owner)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium">{{ $owner->name }}</td>
                    <td class="px-6 py-4">{{ $owner->email }}</td>
                    <td class="px-6 py-4 text-gray-600">
                        {{ $owner->properties_count ?? 0 }}
                    </td>
                    <td class="px-6 py-4 flex gap-2">
                        <!-- Show button -->
                        <a href="{{ route('owners.show', $owner->id) }}"
                           class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600">
                            Show
                        </a>
                        <!-- Edit button -->
                        <a href="{{ route('owners.edit', $owner->id) }}"
                           class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                        No owners found.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $owners->links() }}
    </div>
</div>

</body>
</html>
