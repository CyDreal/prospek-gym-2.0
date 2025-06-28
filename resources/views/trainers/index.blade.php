<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TRAINER MANAGEMENT') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10">
        <div class="mb-4">
            <a href="{{ route('trainers.create') }}" class="bg-orange-500 text-white px-4 py-2 rounded">+ Add Trainer</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($trainers as $trainer)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/' . $trainer->image) }}" alt="{{ $trainer->name }}"
                         class="w-full h-48 object-cover">

                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="text-xl font-bold">{{ $trainer->name }}</h3>
                                <p class="text-gray-600 text-sm">{{ $trainer->role }}</p>
                            </div>
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                {{ ucfirst($trainer->type) }}
                            </span>
                        </div>

                        <p class="text-gray-600 mb-3 text-sm">{{ Str::limit($trainer->description, 100) }}</p>

                        @if($trainer->specializations_title)
                            <div class="mb-3">
                                <h4 class="font-semibold text-sm text-orange-600">{{ $trainer->specializations_title }}</h4>
                            </div>
                        @endif

                        @if($trainer->specializations->count() > 0)
                            <div class="mb-3">
                                <h4 class="font-semibold text-sm mb-1">Specializations:</h4>
                                <div class="flex flex-wrap gap-1">
                                    @foreach($trainer->specializations->take(3) as $spec)
                                        <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                            {{ $spec->name }}
                                        </span>
                                    @endforeach
                                    @if($trainer->specializations->count() > 3)
                                        <span class="bg-gray-200 text-gray-600 text-xs px-2 py-1 rounded">
                                            +{{ $trainer->specializations->count() - 3 }} more
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if($trainer->trainingPackages->count() > 0)
                            <div class="mb-3">
                                <h4 class="font-semibold text-sm mb-1">Training Packages:</h4>
                                @foreach($trainer->trainingPackages->take(2) as $package)
                                    <div class="text-xs bg-green-50 p-2 mb-1 rounded">
                                        <strong>{{ $package->sessions }}</strong> ({{ $package->duration }})<br>
                                        <span class="text-green-600 font-semibold">{{ $package->price }}</span>
                                    </div>
                                @endforeach
                                @if($trainer->trainingPackages->count() > 2)
                                    <p class="text-xs text-gray-500">+{{ $trainer->trainingPackages->count() - 2 }} more packages</p>
                                @endif
                            </div>
                        @endif

                        @if($trainer->achievements->count() > 0)
                            <div class="mb-3">
                                <h4 class="font-semibold text-sm mb-1">Achievements:</h4>
                                <div class="text-xs">
                                    @foreach($trainer->achievements->take(2) as $achievement)
                                        <span class="bg-yellow-50 text-yellow-800 px-2 py-1 rounded mr-1 mb-1 inline-block">
                                            {{ $achievement->title }}
                                        </span>
                                    @endforeach
                                    @if($trainer->achievements->count() > 2)
                                        <span class="text-gray-500">+{{ $trainer->achievements->count() - 2 }} more</span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="flex justify-between items-center mt-4">
                            <div class="flex space-x-2">
                                @if($trainer->instagram_link)
                                    <a href="{{ $trainer->instagram_link }}" target="_blank" class="text-pink-500 hover:text-pink-700">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                        </svg>
                                    </a>
                                @endif
                                @if($trainer->whatsapp_link)
                                    <a href="{{ $trainer->whatsapp_link }}" target="_blank" class="text-green-500 hover:text-green-700">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.106"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>

                            <div class="flex space-x-2">
                                {{-- <a href="{{ route('trainers.show', $trainer->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">View</a>
                                <a href="{{ route('trainers.edit', $trainer->id) }}" class="bg-orange-500 text-white px-3 py-1 rounded text-sm">Edit</a> --}}
                                <form method="POST" action="{{ route('trainers.destroy', $trainer->id) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
