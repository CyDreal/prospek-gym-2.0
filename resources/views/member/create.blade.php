<x-app-layout>
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Add Member</h1>
        <form action="{{ route('members.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name" class="block mb-2" required>
            <input type="text" name="alamat" placeholder="Alamat" class="block mb-2" required>
            <input type="text" name="phone" placeholder="Phone" class="block mb-2" required>
            <select name="paket_nama" class="block mb-2" required>
                <option value="">Pilih Paket</option>
                @foreach ($pakets as $paket)
                    <option value="{{ $paket->nama }}">{{ $paket->nama }}</option>
                @endforeach
            </select>
            <select name="status" class="block mb-2" required>
                <option value="active">Aktif</option>
                <option value="inactive">Tidak Aktif</option>
            </select>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
</x-app-layout>
