<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Images</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-8">
            <a href="{{ route('images.create') }}"
               class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200 shadow-sm">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Upload new Image
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            @foreach($images as $image)
                <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-200 overflow-hidden">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/' . $image->path) }}"
                             alt="{{ $image->filename }}"
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-200">
                    </div>

                    <div class="p-4">
                        <p class="text-sm text-gray-700 font-medium truncate mb-3" title="{{ $image->filename }}">
                            {{ $image->filename }}
                        </p>

                        <form action="{{ route('images.destroy', $image) }}"
                              method="POST"
                              onsubmit="return confirm('حذف؟')"
                              class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors duration-200">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        @if(count($images) === 0)
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No images yet</h3>
                <p class="text-gray-600">Get started by uploading your first image.</p>
            </div>
        @endif
    </div>
</body>
</html>
