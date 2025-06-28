<x-app-layout>
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold mb-6">Add Trainer</h1>

        @if ($errors->any())
            <div class="mb-4">
                <ul class="text-red-600 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('trainers.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <!-- Basic Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                    <input type="text" name="name" class="w-full p-2 border border-gray-300 rounded" required>
                </div>

                <div>
                    <label for="role" class="block text-gray-700 font-bold mb-2">Role</label>
                    <input type="text" name="role" value="Personal Trainer" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="type" class="block text-gray-700 font-bold mb-2">Type</label>
                    <select name="type" class="w-full p-2 border border-gray-300 rounded" required>
                        <option value="freelance">Freelance</option>
                        <option value="inhouse">In House</option>
                    </select>
                </div>

                <div>
                    <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                    <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full p-2 border border-gray-300 rounded" required></textarea>
            </div>

            <!-- Social Links -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="instagram_link" class="block text-gray-700 font-bold mb-2">Instagram Link</label>
                    <input type="url" name="instagram_link" class="w-full p-2 border border-gray-300 rounded">
                </div>

                <div>
                    <label for="whatsapp_link" class="block text-gray-700 font-bold mb-2">WhatsApp Link</label>
                    <input type="text" name="whatsapp_link" placeholder="https://wa.me/6281234567890" class="w-full p-2 border border-gray-300 rounded">
                </div>
            </div>

            <!-- Specializations -->
            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Specializations</label>

                <div class="mb-3">
                    <input type="text" name="specializations_title" placeholder="Custom specializations title (optional)" class="w-full p-2 border border-gray-300 rounded">
                    <small class="text-gray-500">Contoh: "Kelas Cardio & Body Conditioning"</small>
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium mb-2">Existing Specializations</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach($specializations as $spec)
                            <label class="flex items-center">
                                <input type="checkbox" name="specializations[]" value="{{ $spec->id }}" class="mr-2">
                                {{ $spec->name }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div id="new-specializations">
                    <label class="block text-sm font-medium mb-2">Add New Specializations</label>
                    <div class="specialization-input mb-2">
                        <input type="text" name="new_specializations[]" placeholder="Enter specialization" class="w-full p-2 border border-gray-300 rounded">
                    </div>
                </div>
                <button type="button" onclick="addSpecialization()" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Add More</button>
            </div>

            <!-- Training Packages -->
            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Training Packages</label>
                <div id="packages-container">
                    <div class="package-item border p-4 rounded mb-3">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-3">
                            <div>
                                <label class="block text-sm font-medium mb-1">Sessions</label>
                                <input type="text" name="packages[0][sessions]" placeholder="1x session" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Duration</label>
                                <input type="text" name="packages[0][duration]" placeholder="1 Hari" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Price Display</label>
                                <input type="text" name="packages[0][price]" placeholder="Rp50.000" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Sessions Count</label>
                                <input type="number" name="packages[0][sessions_count]" placeholder="1" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Price Numeric</label>
                                <input type="number" name="packages[0][price_numeric]" placeholder="50000" step="0.01" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" onclick="addPackage()" class="bg-green-500 text-white px-3 py-1 rounded text-sm">Add Package</button>
            </div>

            <!-- Achievements -->
            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Achievements</label>
                <div id="achievements-container">
                    <div class="achievement-input mb-2">
                        <input type="text" name="achievements[]" placeholder="Enter achievement" class="w-full p-2 border border-gray-300 rounded">
                    </div>
                </div>
                <button type="button" onclick="addAchievement()" class="bg-purple-500 text-white px-3 py-1 rounded text-sm">Add Achievement</button>
            </div>

            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">
                Save Trainer
            </button>
        </form>
    </div>

    <script>
        let packageIndex = 1;

        function addSpecialization() {
            const container = document.getElementById('new-specializations');
            const div = document.createElement('div');
            div.className = 'specialization-input mb-2';
            div.innerHTML = `
                <div class="flex gap-2">
                    <input type="text" name="new_specializations[]" placeholder="Enter specialization" class="flex-1 p-2 border border-gray-300 rounded">
                    <button type="button" onclick="this.parentElement.parentElement.remove()" class="bg-red-500 text-white px-2 py-1 rounded text-sm">Remove</button>
                </div>
            `;
            container.appendChild(div);
        }

        function addPackage() {
            const container = document.getElementById('packages-container');
            const div = document.createElement('div');
            div.className = 'package-item border p-4 rounded mb-3';
            div.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-3">
                    <div>
                        <label class="block text-sm font-medium mb-1">Sessions</label>
                        <input type="text" name="packages[${packageIndex}][sessions]" placeholder="8x sessions" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Duration</label>
                        <input type="text" name="packages[${packageIndex}][duration]" placeholder="24 Hari" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Price Display</label>
                        <input type="text" name="packages[${packageIndex}][price]" placeholder="Rp40.000/sesi" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Sessions Count</label>
                        <input type="number" name="packages[${packageIndex}][sessions_count]" placeholder="8" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Price Numeric</label>
                        <input type="number" name="packages[${packageIndex}][price_numeric]" placeholder="320000" step="0.01" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="bg-red-500 text-white px-2 py-1 rounded text-sm mt-2">Remove Package</button>
            `;
            container.appendChild(div);
            packageIndex++;
        }

        function addAchievement() {
            const container = document.getElementById('achievements-container');
            const div = document.createElement('div');
            div.className = 'achievement-input mb-2';
            div.innerHTML = `
                <div class="flex gap-2">
                    <input type="text" name="achievements[]" placeholder="Enter achievement" class="flex-1 p-2 border border-gray-300 rounded">
                    <button type="button" onclick="this.parentElement.parentElement.remove()" class="bg-red-500 text-white px-2 py-1 rounded text-sm">Remove</button>
                </div>
            `;
            container.appendChild(div);
        }
    </script>
</x-app-layout>
