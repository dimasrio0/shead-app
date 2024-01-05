@extends('layouts.app')

@section('content')
    <div class="container shadow-sm border mt-5 p-5 rounded">
        <h2 class="h2">Edit Penyakit</h2>
        <hr>
        <form action="{{ route('penyakit.update', $penyakit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Penyakit</label>
                <input type="text" class="form-control" id="nama" name="nama_penyakit" required value="{{ $penyakit->nama_penyakit }}">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" id="keterangan" required>{{ $penyakit->keterangan }}</textarea>
            </div>
            <div class="mb-3">
                <label for="solusi" class="form-label">Solusi</label>
                <textarea name="solusi" class="form-control" id="solusi" required>{{ $penyakit->solusi }}</textarea>
            </div>
            <!-- tambahkan input untuk atribut lainnya -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
