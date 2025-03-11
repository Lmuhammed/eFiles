<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eFiles</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/heroicons@1.0.6/outline.js"></script>
</head>
<body class="bg-gray-100">

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md h-screen">
            <div class="p-4">
                <h1 class="text-2xl font-bold text-gray-800">eFiles</h1>
            </div>
            <nav class="mt-6">
                <ul>
                    <li class="hover:bg-gray-200">
                        <a href="#" class="flex items-center py-2 px-4 text-gray-700">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M3 12h18M3 21h18"></path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li class="hover:bg-gray-200">
                        <a href="#" class="flex items-center py-2 px-4 text-gray-700">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405 1.405A2 2 0 0116 21H8a2 2 0 01-1.595-3.405L5 17h5m5-6h-5m5 0H9m5 0v-2m0 2v2"></path>
                            </svg>
                            Sent files 
                        </a>
                    </li>
                    <li class="hover:bg-gray-200">
                        <a href="#" class="flex items-center py-2 px-4 text-gray-700">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m-3-3H9m3-4V4m0 0H9m3 0h3m-3 0v4"></path>
                            </svg>
                            Recieved files
                        </a>
                    </li>
                    <li class="hover:bg-gray-200">
                        <a href="{{ route('files.index') }}" class="flex items-center py-2 px-4 text-gray-700">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405 1.405A2 2 0 0116 21H8a2 2 0 01-1.595-3.405L5 17h5m5-6h-5m5 0H9m5 0v-2m0 2v2"></path>
                            </svg>
                            All files
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        
        <div class="flex-1 p-6">
            <header class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-semibold text-gray-800">eFiles - </h2>
                <a href="{{ route('files.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add new</a>
            </header
            </div>
        <hr>
        <p  class="text-3xl font-semibold text-gray-800 pt-2 pb-2">
            List of all files
        </p>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">File Name</th>
                    <th class="py-3 px-6 text-left">Requires approval</th>
                    <th class="py-3 px-6 text-left">Created at</th>
                    <th class="py-3 px-6 text-left">Updated at</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($files as $file)
                <tr class="border-b border-gray-300 hover:bg-gray-100">
            <td class="py-3 px-6">{{ $file['title'] }}</td>
            <td class="py-3 px-6">{{ $file['requires_approval'] }}</td>
            <td class="py-3 px-6">{{ $file['created_at'] }}</td>
            <td class="py-3 px-6">{{ $file['updated_at'] }}</td>
            <td class="py-3 px-6">
                <a href="{{ route('files.show',$file) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View</a>
            </tr>
             @endforeach
            </tbody>
        </table>
    </body>
</html>
        
