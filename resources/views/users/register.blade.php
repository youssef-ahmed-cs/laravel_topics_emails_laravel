<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<form action="{{ route('registerRequest') }}" method="post" class="bg-white p-8 rounded shadow-md w-full max-w-md">
    @csrf
    <p class="text-center text-2xl font-bold mb-4">Registration Form</p>
    @if ($errors->any())
        <div class="text-red-500 mb-4">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <input type="text" name="name" value="{{ old('name') }}" placeholder="Name"
           class="mb-4 w-full px-3 py-2 border rounded">

    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
           class="mb-4 w-full px-3 py-2 border rounded">

    <input type="password" name="password" placeholder="Password"
           class="mb-4 w-full px-3 py-2 border rounded">

    <input type="password" name="password_confirmation" placeholder="Confirm Password"
           class="mb-4 w-full px-3 py-2 border rounded">

    <select name="role" class="mb-4 w-full px-3 py-2 border rounded">
        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
    </select>

    <input type="submit" value="Register"
           class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-700 cursor-pointer">
</form>
</body>
</html>
