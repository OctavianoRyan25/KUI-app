<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Letter</title>
    <link rel="icon" href="{{ asset('assets/logo-udinus.png') }}" type="image/x-icon">
    {{-- Build Tailwind --}}
    <script type="module" src="{{ asset('build/assets/app-z-Rg4TxU.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('build/assets/app-Czl1uA6v.css') }}">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <script src="https://unpkg.com/alpinejs@3.4.2/dist/cdn.min.js" defer></script> --}}
    {{-- @vite('resources/css/app.css') --}}
</head>

<body>
    <div class="p-4">
        {{-- Return all error --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.uploadLetter.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block font-medium text-gray-700">Title</label>
                <input type="text" name="title" class="border p-2 w-full">
            </div>
            <div class="mb-4">
                <label class="block font-medium text-gray-700">File 1</label>
                <input type="file" name="file1" class="border p-2 w-full">
            </div>
            <div class="mb-4">
                <label class="block font-medium text-gray-700">File 2</label>
                <input type="file" name="file2" class="border p-2 w-full">
            </div>
            <div class="mb-4">
                <label class="block font-medium text-gray-700">File 3</label>
                <input type="file" name="file3" class="border p-2 w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Upload Files</button>
        </form>

    </div>
</body>

</html>
