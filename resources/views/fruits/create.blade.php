<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Tambah Buah</h2>

        <form action="{{ route('fruits.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block">Nama Buah</label>
                <input type="text" name="name" class="w-full border rounded px-2 py-1" required>
            </div>

            <div>
                <label class="block">Kandungan Gizi</label>
                <textarea name="nutrition" class="w-full border rounded px-2 py-1" required></textarea>
            </div>

            <div>
                <label class="block">Manfaat</label>
                <textarea name="benefits" class="w-full border rounded px-2 py-1" required></textarea>
            </div>

            <div>
                <label class="block">Upload Gambar</label>
                <input type="file" name="image" class="border px-2 py-1">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>
