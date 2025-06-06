<x-app-layout>
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Add Member</h1>
        <form action="{{ route('members.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name" class="block mb-2" required>
            <input type="email" name="email" placeholder="Email" class="block mb-2" required>
            <input type="text" name="phone" placeholder="Phone" class="block mb-2" required>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
</x-app-layout>
