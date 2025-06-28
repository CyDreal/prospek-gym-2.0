<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PROMO MANAGEMENT') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10">
        <div class="mb-4">
            <a href="{{ route('promotions.create') }}" class="bg-orange-500 text-white px-4 py-2 rounded">+ Add
                Promotion</a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">Order</th>
                        <th class="px-4 py-3 text-left">Image</th>
                        <th class="px-4 py-3 text-left">Title</th>
                        <th class="px-4 py-3 text-left">Description</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50">
                    @forelse ($promotions as $promo)
                        <tr class="border-b {{ !$promo->is_active ? 'opacity-50' : '' }}">
                            <td class="px-4 py-3">
                                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                                    {{ $promo->sort_order }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                @if ($promo->image)
                                    <img src="{{ asset('storage/' . $promo->image) }}" alt="promo"
                                        class="w-16 h-16 rounded-md shadow object-cover border border-gray-300">
                                @else
                                    <span class="text-gray-400 italic">No image</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="font-semibold">{{ $promo->title }}</div>
                                <div class="text-xs text-gray-500">{{ $promo->created_at->format('d M Y') }}</div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="max-w-xs">
                                    {!! Str::limit(nl2br(e($promo->description)), 100) !!}
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                @if ($promo->is_active)
                                    <span
                                        class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Active</span>
                                @else
                                    <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Inactive</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex space-x-2">
                                    <a href="{{ route('promotions.edit', $promo->id) }}"
                                        class="bg-orange-500 text-white px-3 py-1 rounded text-sm hover:bg-orange-600">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('promotions.destroy', $promo->id) }}"
                                        class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this promotion?')"
                                            class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                No promotions found. <a href="{{ route('promotions.create') }}"
                                    class="text-orange-500 hover:underline">Create one now</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
