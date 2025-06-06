<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PROMO') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10">
        <div class="mb-4">
            <a href="{{ route('promotions.create') }}" class="bg-orange-500 text-white px-4 py-2 rounded">+ Add
                Promotion</a>
        </div>
        <table class="min-w-full bg-white rounded shadow">
            <thead class="bg-black text-white">
                <tr>
                    <th class="px-4 py-2">Image</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-gray-100">
                @foreach ($promotions as $promo)
                    <tr class="border-b">
                        <td class="p-2">
                            @if ($promo->image)
                                <img src="{{ asset('storage/' . $promo->image) }}" alt="promo"
                                    class="w-20 h-20 rounded-md shadow object-cover border border-gray-300">
                            @else
                                <span class="text-gray-400 italic">No image</span>
                            @endif
                        </td>
                        <td class="p-2">{{ $promo->description }}</td>
                        <td class="p-2 space-x-2">
                            <a href="{{ route('promotions.edit', $promo->id) }}"
                                class="bg-orange-500 text-white px-3 py-1 rounded">Edit</a>
                            <form method="POST" action="{{ route('promotions.destroy', $promo->id) }}" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-black text-white px-3 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
