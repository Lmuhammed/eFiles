<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

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
                <a href="{{ $file['file_path'] }}" class="bg-blue-500 text-black py-2 px-4 rounded hover:bg-green-600 transition duration-200">Open in net tab</a>
                <div>
                    <form action="{{ route('files.destroy', $file) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this file?');" class="bg-red-500 text-black py-2 px-4 rounded hover:bg-red-600 transition duration-200">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    <hr class="mt-2">
<div>
    Department can acsses
    <a class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-green-600 transition duration-200" href="{{ route('dp_file_grantAccessView',$file) }}">Add</a>
</div>
 <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Department name</th>
                        <th class="py-3 px-6 text-left">Date acsses granted</th>
                        <th class="py-3 px-6 text-left">Last Update</th>
                        <th class="py-3 px-6 text-left">Actions</th>

                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($departments as $department)
                    <tr class="border-b border-gray-300 hover:bg-gray-100">
                        <td class="py-3 px-6">{{ $department->department_name  }}</td>
                        <td class="py-3 px-6">{{ $department->pivot->created_at  }}</td>
                        <td class="py-3 px-6">{{ $department->pivot->updated_at  }}</td>
                        <td>
                            <div>
                                <form action="{{ route('dp_file_revokeAccess', ['file' => $file->id, 'departmentId' => $department->id] ) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this department?');" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition duration-200">Delete</button>
                                </form>
                            </div>
                        </td>
                       
                    </tr>
                 
                     @endforeach
                    
                </tbody>
            </table>
<hr>
    <hr class="mt-2">
    @if ($file->requires_approval)
    Approvals
    <div>
        <form action="{{ route('dp_file_approveFile', ['file' => $file, 'departmentId' => $department->id] ) }}" method="POST">
            @csrf
            <button type="submit" onclick="return confirm('Did you agree that you saw this file and you approve it ?');" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-green-600 transition duration-200">Approve</button>
        </form>
    </div>

    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Department</th>
                <th class="py-3 px-6 text-left">Status</th>
                <th class="py-3 px-6 text-left">Notes</th>
                <th class="py-3 px-6 text-left">Approved at</th>
                <th class="py-3 px-6 text-left">Last Update</th>
                <th class="py-3 px-6 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            <tr class="border-b border-gray-300 hover:bg-gray-100">
                @foreach ($approvedDepartments as $approvedFiles)
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $approvedFiles->department_name  }}</td>
                    <td class="py-3 px-6">-</td>
                    <td class="py-3 px-6">-</td>
                    <td class="py-3 px-6">{{ $approvedFiles->pivot->created_at  }}</td>
                    <td class="py-3 px-6">{{ $approvedFiles->pivot->updated_at  }}</td>
                    <td>
                        <div>
                            <form action="{{ route('dp_file_revokeApproval', ['file' => $file->id, 'departmentId' => $department->id] ) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this department?');" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition duration-200">Delete</button>
                            </form>
                        </div>
                    </td>
                   
                </tr>
             
                 @endforeach
            </tr>
        </tbody>
    </table>
    @endif

    </div>
</x-app-layout>