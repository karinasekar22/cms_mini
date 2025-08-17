<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Article/Create') }}
            </h2>
            <a href="{{ route('articles.index') }}"
                class="bg-slate-700 text-sm text-white rounded-md px-3 py-2">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('articles.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="title-article" class="text-md font-medium mb-2">Title</label>
                            <div class="my-3">
                                <input value="{{ old('title') }}" name="title" id="title-article"
                                    placeholder="Enter Title For Your Article" type="text"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('title')
                                    <p class="text-red-700 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="description-article" class="text-md font-medium mb-2">Content</label>
                            <div class="my-3">
                                <textarea placeholder="Type Here..." name="text" id="description-article"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg" cols="30"
                                    rows="10">{{ old('text') }}</textarea>
                            </div>

                            <label for="author" class="text-md font-medium mb-2">Author</label>
                            <div class="my-3">
                                <input value="{{ old('author') }}" name="author" id="author" placeholder="Enter Author"
                                    type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('title')
                                    <p class="text-red-700 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="bg-slate-700 text-sm rounded-md px-2 py-2 text-white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>