<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('eFiles') }}
        </h2>
    </x-slot>
    <div class="bg-white-100">
        <div class="flex">
            <!-- Sidebar -->
                <nav class="px-2 mt-2">
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
                            <a href="{{ route('files.sent') }}" class="flex items-center py-2 px-4 text-gray-700">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405 1.405A2 2 0 0116 21H8a2 2 0 01-1.595-3.405L5 17h5m5-6h-5m5 0H9m5 0v-2m0 2v2"></path>
                                </svg>
                                Sent files 
                            </a>
                        </li>
                        <li class="hover:bg-gray-200">
                            <a href="{{ route('files.received') }}" class="flex items-center py-2 px-4 text-gray-700">
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
</x-app-layout>