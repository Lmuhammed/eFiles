<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>eFile - {{ $file['title'] }}</title>
</head>
<body class="bg-gray-100 p-6">

    <div class="container mx-auto bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold mb-2 text-center">File Details</h1>
        
        <div class="flex flex-col md:flex-row md:space-x-6">
            <div class="md:w-1/3">
                <h2 class="text-xl font-semibold mb-2">File Information</h2>
                <ul class="bg-gray-50 border border-gray-300 rounded-lg p-4">
                    <li class="py-2"><strong>File Name:</strong> {{ $file['title'] }}</li>
                    <li class="py-2"><strong>Upload Date:</strong> {{ $file['created_at'] }}</li>
                    <li class="py-2"><strong>Update Date:</strong> {{ $file['created_at'] }}</li>
                    <li class="py-2"><strong>Requires approval:</strong> {{ $file['requires_approval'] }}</li>


                </ul>
            </div>
            <div class="md:w-2/3">
                <h2 class="text-xl font-semibold mb-2">Preview</h2>
                <div class="bg-gray-50 border border-gray-300 rounded-lg p-4 h-64 flex items-center justify-center">            
                    <iframe src=" {{ $file['file_path'] }}" title="{{ $file['title'] }}">
                    </iframe> 
                </div>
            </div>
           
        </div>
        <div class="mt-2">
            <h2 class="text-xl font-semibold mb-2">Actions</h2>
            <div class="flex space-x-4">
                <a href="{{ $file['file_path'] }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-200">Open in net tab</a>
                <div>
                    <form action="{{ route('files.destroy', $file) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this file?');" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition duration-200">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    <hr class="mt-2">
Department can acsses
 <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">department name</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <tr class="border-b border-gray-300 hover:bg-gray-100">
                        <td class="py-3 px-6">document.pdf</td>
                    </tr>
                </tbody>
            </table>
<hr>
    <hr class="mt-2">
Approvals
 <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">user_id</th>
                        <th class="py-3 px-6 text-left">status</th>
                        <th class="py-3 px-6 text-left">comments</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <tr class="border-b border-gray-300 hover:bg-gray-100">
                        <td class="py-3 px-6">document.pdf</td>
                        <td class="py-3 px-6">2023-10-01</td>
                        <td class="py-3 px-6">text text text</td>
                    </tr>
                </tbody>
            </table>
<hr>
       
    </div>

</body>
</html>

