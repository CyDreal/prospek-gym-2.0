<x-app-layout>
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Edit Member</h1>
        <form action="{{ route('members.update', $member->id) }}" method="POST">
            @csrf @method('PUT')
            <input type="text" name="name" value="{{ $member->name }}" class="block mb-2" required>
            <input type="email" name="email" value="{{ $member->email }}" class="block mb-2" required>
            <input type="text" name="phone" value="{{ $member->phone }}" class="block mb-2">
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
