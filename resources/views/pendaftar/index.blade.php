<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <style>
    .pagination-wrapper {
        display: flex;
        justify-content: center; /* Biar pagination di tengah */
    }
    .pagination {
        margin: 0;
        font-size: 0.875rem; /* Ukuran font kecil rapi */
    }
    .pagination .page-item .page-link {
        padding: 6px 12px; /* Perkecil padding tombol */
        font-size: 0.875rem; /* Sesuaikan ukuran teks */
    }
    .pagination .page-item .page-link svg {
        width: 1em;
        height: 1em;
    }
</style>

</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Pendaftar Vaksinasi</h1>

    <a href="{{ route('pendaftar.create') }}" class="btn btn-primary mb-3">+ Tambah Pendaftar</a>
    <a href="{{ route('pendaftar.deleted') }}" class="btn btn-danger mb-3">🗑️ Lihat Data Dihapus</a>

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
                        <span class="badge bg-primary">Terdaftar</span>
                    @elseif ($pendaftar->status == 'hadir')
                        <span class="badge bg-success">Hadir</span>
                    @else
                        <span class="badge bg-danger">Tidak Hadir</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('pendaftar.edit', $pendaftar->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pendaftar.destroy', $pendaftar->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination-wrapper mt-4">
        <!-- {{ $pendaftars->links() }} --> {{ $pendaftars->onEachSide(1)->links('pagination::bootstrap-5') }}

    </div>
</div>
</body>

@endsection
</html>

