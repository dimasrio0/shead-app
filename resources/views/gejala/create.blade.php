@extends('layouts.app')

@section('content')
    <div class="container shadow-sm border mt-5 p-5 rounded">
        <h2 class="h2">Tambah Gejala Yang Terjadi Pada Penyakit</h2>
        <hr>
        <form action="{{ route('gejala.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id_penyakit">Pilih Penyakit:</label>
                <select name="id_penyakit" id="id_penyakit" class="form-control">
                    @foreach ($penyakitList as $penyakit)
                        <option value="{{ $penyakit->id }}">{{ $penyakit->nama_penyakit }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="gejala" class="form-label">Gejala</label>
                <textarea name="gejala" class="form-control" id="gejala" required></textarea>
            </div>
            <!-- tambahkan input untuk atribut lainnya -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
