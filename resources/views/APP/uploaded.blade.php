<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Uploaded Files Table</title>
</head>
<body class="bg-gray-100 p-6">

    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Uploaded Files</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">File Name</th>
                        <th class="py-3 px-6 text-left">Upload Date</th>
                        <th class="py-3 px-6 text-left">Status</th>
                        <th class="py-3 px-6 text-left">Created at</th>
                        <th class="py-3 px-6 text-left">Updated at</th>
                        <th class="py-3 px-6 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <tr class="border-b border-gray-300 hover:bg-gray-100">
                        <td class="py-3 px-6">document.pdf</td>
                        <td class="py-3 px-6">2023-10-01</td>
                        <td class="py-3 px-6">1.2 MB</td>
                        <td class="py-3 px-6">1.2 MB</td>
                        <td class="py-3 px-6">1.2 MB</td>
                        <td class="py-3 px-6">
                            <button class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600 transition duration-200">View</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>

