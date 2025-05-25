<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Data Buah</h2>

            <form method="GET" action="{{ route('fruits.index') }}" class="mb-4 flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari buah..."
                    class="w-full border px-4 py-2 rounded">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cari</button>
            </form>
            
            <a href="{{ route('fruits.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</a>
        </div>

        <table class="w-full table-auto border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-2 py-1">No</th>
                    <th class="border px-2 py-1">Nama</th>
                    <th class="border px-2 py-1">Gizi</th>
                    <th class="border px-2 py-1">Manfaat</th>
                    <th class="border px-2 py-1">Foto</th>
                    <th class="border px-2 py-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fruits as $fruit)
                <tr>
                    <td class="border px-2 py-1">{{ $loop->iteration }}</td>
                    <td class="border px-2 py-1">{{ $fruit->name }}</td>
                    <td class="border px-2 py-1">{{ $fruit->nutrition }}</td>
                    <td class="border px-2 py-1">{{ $fruit->benefits }}</td>
                    <td class="border px-2 py-1">
                        @if($fruit->image)
                        <img src="{{ asset('storage/' . $fruit->image) }}" class="w-16">
                        @endif
                    </td>
                    <td class="border px-2 py-1 space-x-1">
                        <a href="{{ route('fruits.edit', $fruit) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('fruits.destroy', $fruit) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600" onclick="return confirm('Hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
       <a href="{{ route('fruits.print') }}" target="_blank" class="bg-green-500 text-white px-4 py-2 rounded mt-4 inline-block">Cetak</a>
    </div>
</x-app-layout>