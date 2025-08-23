<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Edit Employee</title>
</head>
<body class="bg-gray-100 text-gray-900">

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Edit Employee</h1>

    <div class="bg-white rounded-2xl shadow-md p-6 max-w-lg mx-auto">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-2 font-semibold">Name</label>
                <input type="text" name="name" value="{{ old('name', $employee->name) }}"
                       class="w-full border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold">Sales Office</label>
                <select name="sales_office_id" class="w-full border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200">
                    @foreach($salesOffices as $office)
                        <option value="{{ $office->id }}"
                            {{ $employee->sales_office_id == $office->id ? 'selected' : '' }}>
                            {{ $office->name }}
                        </option>

                    @endforeach

                </select>
                @error('sales_office_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2 mt-6">
                <a href="{{ route('employees.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
