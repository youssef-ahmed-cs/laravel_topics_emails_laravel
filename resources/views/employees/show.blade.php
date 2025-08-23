<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Employee Details</title>
</head>
<body class="bg-gray-100 text-gray-900">

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Employee Details</h1>

    <div class="bg-white rounded-2xl shadow-md p-6 max-w-lg mx-auto">
        <p class="mb-4"><span class="font-semibold">ID:</span> {{ $employees->id }}</p>
        <p class="mb-4"><span class="font-semibold">Name:</span> {{ $employees->name }}</p>
        <p class="mb-4"><span class="font-semibold">Sales Office:</span> {{ $employees->salesOffice->id ?? '-' }}</p>
        <p class="mb-4"><span class="font-semibold">Created At:</span> {{ $employees->created_at->format('Y-m-d H:i') }}</p>
        <p class="mb-4"><span class="font-semibold">Updated At:</span> {{ $employees->updated_at->format('Y-m-d H:i') }}</p>

        <div class="flex gap-2 mt-6">
            <a href="{{ route('employees.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                Back
            </a>
            <a href="{{ route('employees.edit', $employees->id) }}"
               class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Edit
            </a>
            <form action="{{ route('employees.destroy', $employees->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this employee?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
