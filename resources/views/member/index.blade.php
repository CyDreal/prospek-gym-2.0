<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MEMBERS LIST') }}
        </h2>
    </x-slot>



    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold"></h2>
            <a href="{{ route('members.export') }}" class="btn btn-success">Export to Excel</a>

        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold"></h2>
            <a href="{{ route('members.create') }}" class="btn btn-primary">+ Add Member</a>

        </div>


        <form action="{{ route('members.index') }}" method="GET" class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari nama/alamat/telepon..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">-- Semua Status --</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="col-md-3">
                <select name="paket_nama" class="form-select">
                    <option value="">-- Semua Paket --</option>
                    @foreach ($pakets as $paket)
                        <option value="{{ $paket->nama }}"
                            {{ request('paket_nama') == $paket->nama ? 'selected' : '' }}>
                            {{ $paket->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100" type="submit">Filter</button>
            </div>
        </form>
        @if ($members->isEmpty())
            <div class="alert alert-info">
                Tidak ada anggota yang ditemukan.
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No.hp</th>
                    <th scope="col">Paket Yang Diambil</th>
                    <th scope="col">Status</th>
                    <th scope="col" style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $index => $member)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->alamat }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->paket_nama ?? 'N/A' }}</td>
                        <td>
                            <span class="badge bg-{{ $member->status == 'active' ? 'success' : 'danger' }}">
                                {{ ucfirst($member->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('members.update', $member->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <form action="{{ route('members.destroy', $member->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $members->withQueryString()->links() }}


    </div>



</x-app-layout>
