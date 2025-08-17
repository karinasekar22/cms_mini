<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users/Create') }}
            </h2>
            <a href="{{ route('users.index') }}" class="bg-slate-700 text-sm text-white rounded-md px-3 py-2">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="user-name" class="text-md font-medium mb-2">Name</label>
                            <div class="my-3">
                                <input value="{{ old('name') }}" name="name" id="user-name"
                                    placeholder="Enter name here..." type="text"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('name')
                                    <p class="text-red-700 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="email" class="text-md font-medium mb-2">Email</label>
                            <div class="my-3">
                                <input value="{{ old('email') }}" name="email" id="email" placeholder="Enter email..."
                                    type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('email')
                                    <p class="text-red-700 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="password" class="text-md font-medium mb-2">Password</label>
                            <div class="my-3">
                                <input value="{{ old('password') }}" name="password" id="password"
                                    placeholder="Enter password..." type="password"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('password')
                                    <p class="text-red-700 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="confirm-password" class="text-md font-medium mb-2">Confirm Password</label>
                            <div class="my-3">
                                <input value="{{ old('confirm_password') }}" name="confirm_password"
                                    id="confirm-password" placeholder="Enter your password again..." type="password"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('confirm_password')
                                    <p class="text-red-700 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-4 mb-3">
                                @if ($roles->isNotEmpty())
                                    @foreach ($roles as $role)
                                        <div class="mt-3">
                                            <input id="role-{{ $role->id }}" type="checkbox" class="rounded" name="role[]"
                                                value="{{ $role->name }}">
                                            <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button class="bg-slate-700 text-sm rounded-md px-2 py-2 text-white">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>