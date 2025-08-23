<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>All Employees</title>
</head>
<body class="bg-gray-100 text-gray-900">

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Manage Employees</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- ✅ زر Create Employee -->
    <div class="mb-4 text-right">
        <a href="{{ route('employees.create') }}"
           class="bg-green-500 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600 transition">
            + Create Employee
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-2xl shadow-md">
        <table class="min-w-full text-left text-sm">
            <thead class="bg-gray-200 text-gray-700 uppercase text-xs">
            <tr>
                <th class="px-6 py-3">ID</th>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Sales Office</th>
                <th class="px-6 py-3">Created At</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($employees as $employee)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $employee->id }}</td>
                    <td class="px-6 py-4">{{ $employee->name }}</td>
                    <td class="px-6 py-4">{{ $employee->salesOffice->name ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $employee->created_at->format('Y-m-d') }}</td>
                    <td class="px-6 py-4 flex gap-2">
                        <a href="{{ route('employees.show', $employee->id) }}"
                           class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600">
                            View
                        </a>

                        <a href="{{ route('employees.edit', $employee->id) }}"
                           class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600">
                            Edit
                        </a>

                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this employee?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">No employees found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $employees->links() }}
    </div>
</div>

</body>
</html>
