<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the file input */
        .file-input {
            display: none;
        }
        .file-label {
            @apply inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer hover:bg-blue-700 transition duration-200;
        }
    </style>
</head>

    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <body class="bg-gray-100 flex items-center justify-center min-h-screen">
            @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Upload Files</h2>
        <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">File title </label>
                <input type="text" name="title" id="title">
            </div>

            <div class="mb-6">
                <label for="file" class="block text-sm font-medium text-gray-700 mb-2">Choose a file</label>
                <input type="file" id="file" name="file" class="file-input" required>
                <label for="file" class="file-label" name="file" >Select File</label>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea id="description" name="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" placeholder="Add a description..."></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200">Upload</button>
        </form>
    </div>

</body>
</html>
