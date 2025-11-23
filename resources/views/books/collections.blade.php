<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if($books->isEmpty())
                    <p>Tidak ada buku tersedia.</p>
                @else
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Judul</th>
                                <th class="border border-gray-300 px-4 py-2">Penulis</th>
                                <th class="border border-gray-300 px-4 py-2">Tahun Terbit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $book->title }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $book->author ?? '-' }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $book->published_year ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
