<x-app-layout>
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold mb-6">Edit Trainer</h1>

        <form action="{{ route('trainers.update', $trainer->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <!-- Basic Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                    <input type="text" name="name" value="{{ old('name', $trainer->name) }}" class="w-full p-2 border border-gray-300 rounded" required>
                </div>

                <div>
                    <label for="role" class="block text-gray-700 font-bold mb-2">Role</label>
                    <input type="text" name="role" value="{{ old('role', $trainer->role) }}" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="type" class="block text-gray-700 font-bold mb-2">Type</label>
                    <select name="type" class="w-full p-2 border border-gray-300 rounded" required>
                        <option value="freelance" {{ $trainer->type == 'freelance' ? 'selected' : '' }}>Freelance</option>
                        <option value="inhouse" {{ $trainer->type == 'inhouse' ? 'selected' : '' }}>In House</option>
                    </select>
                </div>

                <div>
                    <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                    <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded">
                    @if ($trainer->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $trainer->image) }}" alt="Current Image"
                                class="w-32 h-auto rounded shadow">
                        </div>
                    @endif
                </div>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full p-2 border border-gray-300 rounded" required>{{ old('description', $trainer->description) }}</textarea>
            </div>

            <!-- Social Links -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="instagram_link" class="block text-gray-700 font-bold mb-2">Instagram Link</label>
                    <input type="url" name="instagram_link" value="{{ old('instagram_link', $trainer->instagram_link) }}" class="w-full p-2 border border-gray-300 rounded">
                </div>

                <div>
                    <label for="whatsapp_link" class="block text-gray-700 font-bold mb-2">WhatsApp Link</label>
                    <input type="text" name="whatsapp_link" value="{{ old('whatsapp_link', $trainer->whatsapp_link) }}" placeholder="https://wa.me/6281234567890" class="w-full p-2 border border-gray-300 rounded">
                </div>
            </div>

            <!-- Specializations -->
            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Specializations</label>

                <div class="mb-3">
                    <input type="text" name="specializations_title" value="{{ old('specializations_title', $trainer->specializations_title) }}" placeholder="Custom specializations title (optional)" class="w-full p-2 border border-gray-300 rounded">
                    <small class="text-gray-500">Contoh: "Kelas Cardio & Body Conditioning"</small>
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium mb-2">Existing Specializations</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach($specializations as $spec)
                            <label class="flex items-center">
                                <input type="checkbox" name="specializations[]" value="{{ $spec->id }}"
                                       {{ $trainer->specializations->contains($spec->id) ? 'checked' : '' }} class="mr-2">
                                {{ $spec->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Current Training Packages -->
            @if($trainer->trainingPackages->count() > 0)
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Current Training Packages</label>
                    <div class="bg-gray-50 p-4 rounded">
                        @foreach($trainer->trainingPackages as $package)
                            <div class="flex justify-between items-center mb-2 p-2 bg-white rounded">
                                <div>
                                    <strong>{{ $package->sessions }}</strong> ({{ $package->duration }}) - {{ $package->price }}
                                </div>
                                <form method="POST" action="{{ route('training-packages.destroy', $package->id) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-xs" onclick="return confirm('Delete this package?')">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Current Achievements -->
            @if($trainer->achievements->count() > 0)
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Current Achievements</label>
                    <div class="bg-gray-50 p-4 rounded">
                        @foreach($trainer->achievements as $achievement)
                            <div class="flex justify-between items-center mb-2 p-2 bg-white rounded">
                                <div>{{ $achievement->title }}</div>
                                <form method="POST" action="{{ route('achievements.destroy', $achievement->id) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-xs" onclick="return confirm('Delete this achievement?')">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">
                Update Trainer
            </button>
        </form>
    </div>
</x-app-layout>
