@extends('layouts.app')

@section('content')
    <div class="container shadow-sm border mt-5 p-5 rounded">
        <h2 class="h2">Tambah Penyakit</h2>
        <hr>
        <form action="{{ route('penyakit.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Penyakit</label>
                <input type="text" class="form-control" id="nama" name="nama_penyakit" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" id="keterangan" required></textarea>
            </div>
            <div class="mb-3">
                <label for="solusi" class="form-label">Solusi</label>
                <textarea name="solusi" class="form-control" id="solusi" required></textarea>
            </div>
            <!-- tambahkan input untuk atribut lainnya -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
