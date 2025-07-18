<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard</title>
</head>
<body>
<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-4">Information</h1>
    <p class="mb-4">Welcome <b>{{ auth()->user()->name }}</b> ,  your Information!</p>

    @if(session('message'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded shadow-xl">
        <h2 class="text-xl font-semibold mb-4">User Information</h2>
        <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
        <p><strong>Email:</strong>
            <a class="text-blue-600 hover:underline" href="mailto:{{ auth()->user()->email }}">
                {{ auth()->user()->email }}
            </a>
        </p>

        <p><strong>Role:</strong> {{ auth()->user()->role }}</p>
        <p><strong>Created At:</strong> {{ auth()->user()->created_at->format('d M Y') }}</p>x
    </div>
    <div class="mt-6">
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="text-red-500 hover:text-red-700 font-medium">
                Logout
            </button>
        </form>
    </div>

</div>
</body>
</html>
