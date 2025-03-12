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
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
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
        <form action="{{ route('d_f.attach') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="file_id" value="{{ $file->id }}">
            @foreach($departments as $department)
            <div class="mb-2">
                <input type="checkbox" name="department_ids[]" value="{{ $department->id }}" id="department_{{ $department->id }}">
                <label for="department_{{ $department->id }}" class="ml-2">{{ $department->department_name }}</label>
            </div>
        @endforeach
            {{-- <div class="mt-4 mb-4">
                <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                <select id="department" name="department_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Select a department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                    @endforeach
                </select>
            </div> --}}

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200">Upload</button>
        </form>
    </div>

</body>
</html>
