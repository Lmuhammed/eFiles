<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Chose Department that can acsses this File : {{ $file->name }} click to accses (added later) </h2>
        <form action="{{ route('d_f.attach') }}" method="POST">
            @csrf
            <input type="hidden" name="file_id" value="{{ $file->id }}">
            @foreach($departments as $department)
            <div class="mb-2">
                <input type="checkbox" name="department_ids[]" value="{{ $department->id }}" id="department_{{ $department->id }}">
                <label for="department_{{ $department->id }}" class="ml-2">{{ $department->department_name }}</label>
            </div>
        @endforeach

            <button type="submit" class="w-full bg-blue-600 text-black font-semibold py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200">GRANT ACCESS</button>
        </form>
    </div>
</x-app-layout>
