@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Pendaftar Dihapus</h1>

    <a href="{{ route('pendaftar.index') }}" class="btn btn-secondary mb-3">← Kembali ke Daftar Pendaftar</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NIK</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Vaksin</th>
                <th>Lokasi Vaksin</th>
                <th>Tanggal Vaksin</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftars as $index => $pendaftar)
                <tr>
                    <td>{{ $pendaftars->firstItem() + $index }}</td>
                    <td>{{ $pendaftar->nama_lengkap }}</td>
                    <td>{{ $pendaftar->nik }}</td>
                    <td>{{ $pendaftar->tanggal_lahir }}</td>
                    <td>{{ $pendaftar->jenis_vaksin }}</td>
                    <td>{{ $pendaftar->lokasi_vaksin }}</td>
                    <td>{{ $pendaftar->tanggal_vaksin }}</td>
                    <td>
                        @if ($pendaftar->status == 'terdaftar')
                            <span class="badge bg-primary text-dark">Terdaftar</span>
                        @elseif ($pendaftar->status == 'hadir')
                            <span class="badge bg-success text-dark">Hadir</span>
                        @else
                            <span class="badge bg-danger text-dark">Tidak Hadir</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('pendaftar.restore', $pendaftar->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            <button class="btn btn-sm btn-info" type="submit">Restore</button>
                        </form>

                        <form action="{{ route('pendaftar.forceDelete', $pendaftar->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus permanen?')" type="submit">Hapus Permanen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-3">
        {{ $pendaftars->links() }}
    </div>
</div>
@endsection
