<x-app-layout>
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold mb-6">Edit Promotion</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('promotions.update', $promotion->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                    <input type="text" name="title" value="{{ old('title', $promotion->title) }}"
                           class="w-full p-2 border border-gray-300 rounded" required>
                </div>

                <div>
                    <label for="sort_order" class="block text-gray-700 font-bold mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $promotion->sort_order) }}"
                           min="0" class="w-full p-2 border border-gray-300 rounded">
                </div>
            </div>

            <div class="mb-6">
                <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded" accept="image/*">

                @if ($promotion->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $promotion->image) }}" alt="Current Image"
                            class="w-32 h-auto rounded shadow">
                    </div>
                @endif
            </div>

            <div class="mb-6">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description (HTML allowed)</label>
                <textarea name="description" rows="8" class="w-full p-2 border border-gray-300 rounded" required>{{ old('description', $promotion->description) }}</textarea>
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1"
                           {{ old('is_active', $promotion->is_active) ? 'checked' : '' }} class="mr-2">
                    <span class="text-gray-700 font-bold">Active</span>
                </label>
            </div>

            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">
                Update Promotion
            </button>
        </form>
    </div>
</x-app-layout>
