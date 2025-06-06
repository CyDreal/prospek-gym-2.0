<x-app-layout>
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold mb-6">Edit trainer</h1>

        <form action="{{ route('trainers.update', $trainer->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded">

                @if ($trainer->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $trainer->image) }}" alt="Current Image"
                            class="w-32 h-auto rounded shadow">
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea name="description" rows="5" class="w-full p-2 border border-gray-300 rounded">{{ old('description', $trainer->description) }}</textarea>
            </div>

            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">
                Save
            </button>
        </form>
    </div>
</x-app-layout>
