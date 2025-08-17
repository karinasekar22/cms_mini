<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Role/Create') }}
            </h2>
            <a href="{{ route('roles.list') }}" class="bg-slate-700 text-sm text-white rounded-md px-3 py-2">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="roles-name" class="text-md font-medium mb-2">Name</label>
                            <div class="my-3">
                                <input value="{{ old('name') }}" name="name" id="roles-name"
                                    placeholder="Enter Role Name" type="text"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('name')
                                    <p class="text-red-700 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="grid grid-cols-4 mb-3">
                                @if ($permissions->isNotEmpty())
                                    @foreach ($permissions as $permission)
                                        <div class="mt-3">
                                            <input id="permission-{{ $permission->id }}" type="checkbox" class="rounded"
                                                name="permission[]" value="{{ $permission->name }}">
                                            <label for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                @endif


                            </div>
                            <button class="bg-slate-700 text-sm rounded-md px-2 py-2 text-white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>