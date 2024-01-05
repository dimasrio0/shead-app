@extends('layouts.app')

@section('content')
    <div class="container shadow-sm border mt-5 p-5 rounded">
        <h2 class="h2">Edit gejala</h2>
        <hr>
        <form action="{{ route('gejala.update', $gejala->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="id_penyakit">Pilih Penyakit:</label>
                <select name="id_penyakit" id="id_penyakit" class="form-control">
                    @foreach ($penyakitList as $penyakit)
                        @if ($penyakit->id == $gejala->id_penyakit)
                            <option value="{{ $penyakit->id }}" selected>{{ $penyakit->nama_penyakit }}</option>
                        @else
                            <option value="{{ $penyakit->id }}">{{ $penyakit->nama_penyakit }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="gejala" class="form-label">Gejala</label>
                <textarea name="gejala" class="form-control" id="gejala" required>{{$gejala->gejala}}</textarea>
            </div>
            <!-- tambahkan input untuk atribut lainnya -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
