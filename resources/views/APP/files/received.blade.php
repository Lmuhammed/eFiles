<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Received files') }}
        </h2>
    </x-slot>
 <div class="container mx-auto">
        <div class="overflow-x-auto">
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
        </div>
    </div>
</x-app-layout>
