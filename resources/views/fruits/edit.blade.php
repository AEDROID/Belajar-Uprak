<x-app-layout>
    <div class="max-w-2xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Edit Data Buah</h2>
        <form action="{{ route('fruits.update', $fruit) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold">Nama Buah</label>
                <input type="text" name="name" value="{{ old('name', $fruit->name) }}" required
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label class="block font-semibold">Kandungan Gizi</label>
                <textarea name="nutrition" required class="w-full border px-3 py-2 rounded">{{ old('nutrition', $fruit->nutrition) }}</textarea>
            </div>

            <div>
                <label class="block font-semibold">Manfaat</label>
                <textarea name="benefits" required class="w-full border px-3 py-2 rounded">{{ old('benefits', $fruit->benefits) }}</textarea>
            </div>

            <div>
                <label class="block font-semibold">Foto</label>
                @if($fruit->image)
                    <img src="{{ asset('storage/' . $fruit->image) }}" alt="Foto Buah" class="w-32 mb-2">
                @endif
                <input type="file" name="image" accept="image/*" class="w-full">
            </div>

            <div>
                <button type="submit" class="btn-primary bg-blue-600 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
