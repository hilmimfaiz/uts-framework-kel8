@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pendaftar Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pendaftar.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
        </div>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>
        <div class="mb-3">
            <label for="jenis_vaksin" class="form-label">Jenis Vaksin</label>
            <input type="text" class="form-control" id="jenis_vaksin" name="jenis_vaksin" required>
        </div>
        <div class="mb-3">
            <label for="lokasi_vaksin" class="form-label">Lokasi Vaksin</label>
            <input type="text" class="form-control" id="lokasi_vaksin" name="lokasi_vaksin" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_vaksin" class="form-label">Tanggal Vaksin</label>
            <input type="date" class="form-control" id="tanggal_vaksin" name="tanggal_vaksin" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="terdaftar">Terdaftar</option>
                <option value="hadir">Hadir</option>
                <option value="tidak_hadir">Tidak Hadir</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
