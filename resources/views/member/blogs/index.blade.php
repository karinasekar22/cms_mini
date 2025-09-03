<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Blog Management
        </h2>

    </x-slot>
    <x-slot name="headerRight">
        <form action="{{ route('member.blogs.index') }}" method="get">
            <x-text-input id="search" name="search" typye="text" class="p-1 m-0 md:w-72 w-80 mt-33 md:mt-0"
                value="{{ request('search') }}" placeholder="Masukkan kata kunci..." />
            <x-secondary-button class="p-1" type="submit">Cari</x-secondary-button>
        </form>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg overflow-x-auto">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-3 flex justify-end mx-6">
                        <a href="{{ route('member.blogs.create') }}"
                            class="inline bg-slate-600 text-white py-2 px-3 hover:bg-slate-500 rounded-md text-md font-medium">+
                            Tambah
                            Article</a>
                    </div>
                    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap table-fixed">
                        <thead>
                            <tr class="text-center font-bold">
                                <td class="border px-6 py-4 w-[80px]">No</td>
                                <td class="border px-6 py-4">Judul</td>
                                <td class="border px-6 py-4 lg:w-[250px] hidden lg:table-cell">Tanggal</td>
                                <td class="border px-6 py-4 lg:w-[100px] hidden lg:table-cell">Status</td>
                                <td class="border px-6 py-4 lg:w-[250px] w-[100px]">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td class="border px-6 py-4 text-center">{{ $data->firstItem() + $key }}</td>
                                    <td class="border px-6 py-4">
                                        {{ $value->title }}
                                        <div class="block lg:hidden text-sm text-gray-500">
                                            {{ $value->status }} | {{ $value->created_at->isoFormat('dddd, D MMMM Y') }}
                                        </div>
                                    </td>
                                    <td class="border px-6 py-4 text-center text-gray-500 text-sm hidden lg:table-cell">
                                        {{ $value->created_at->isoFormat('dddd, D MMMM Y') }}
                                    </td>
                                    <td class="border px-6 py-4 text-center text-sm hidden lg:table-cell">
                                        {{ $value->status }}
                                    </td>
                                    <td class="border px-6 py-4 text-center">
                                        <a href='{{ route("member.blogs.edit", ['post' => $value->id]) }}'
                                            class="bg-cyan-600 text-sm text-white rounded-md px-3 py-2 hover:bg-cyan-700">Edit</a>
                                        <a target="_blank" href="{{ route('blog-detail', $value->slug) }}"
                                            class="bg-slate-600 text-sm text-white rounded-md px-3 py-2 hover:bg-slate-700">Lihat</a>
                                        <form class="inline" onsubmit="return confirm('Yakin akan menghapus article ini?')"
                                            method="post"
                                            action="{{ route('member.blogs.destroy', ['post' => $value->id]) }}">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-md text-[12px]">Hapus</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-5">{{ $data->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>