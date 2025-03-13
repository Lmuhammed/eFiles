<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create file') }}
        </h2>
    </x-slot>
    <div class="w-1/2 mx-auto px-4 mt-5">
        <h1 class="mt-4 text-2xl text-gray-700 leading-relaxed">
            Upload a file
        </h1>
            <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mt-4">
            <x-label for="title" value="{{ __('File name') }}" />
            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <div class="mt-4">

            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
            <input name="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Supported : PDF, PNG, JPG .</p>
            
        </div>

        <input class="w-full bg-sky-800 text-black font-bold mt-6 py-2 rounded hover:bg-green-600" type="submit" value="Upload">
        
      </form>
  </div>
</x-app-layout>
