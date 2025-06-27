<x-app-layout>
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Edit Member</h1>
        <form action="{{ route('members.update', $member->id) }}" method="POST">
            @csrf @method('PUT')
            <input type="text" name="name" value="{{ $member->name }}" class="block mb-2" required>
            <input type="text" name="alamat" value="{{ $member->alamat }}" class="block mb-2" required>
            <input type="text" name="phone" value="{{ $member->phone }}" class="block mb-2" required>
            <select name="paket_nama" class="block mb-2" required>
                <option value="">Select Paket</option>
                @foreach ($pakets as $paket)
                    <option value="{{ $paket->nama }}" {{ $member->paket_nama == $paket->nama ? 'selected' : '' }}>
                        {{ $paket->nama }}

                    </option>
                @endforeach
            </select>
            <select name="status" class="block mb-2" required>
                <option value="active" {{ $member->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $member->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
