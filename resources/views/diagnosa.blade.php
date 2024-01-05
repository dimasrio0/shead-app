<!-- resources/views/diagnosa.blade.php -->

@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('prosesDiagnosa') }}">
        @csrf

        <h2 class="h3 mt-5 mb-2 text-black">Diagnosa Penyakit Ikan</h2>
        <h4 class="text-secondary text-center mb-5">Silahkan Pilih Gejala-Gejala Yang Ikan Anda Alami</h4>

        @foreach ($gejalaTersedia as $gejala)
            <div class="form text-center py-3 mx-4 border d-flex p-3 gap-2 align-items-center">
                <input required class="form-check-input rounded-circle" style="cursor: pointer" type="radio" name="gejala[]" value="{{ $gejala->id }}">
                <label class="form-check-label text-black" for="gejala">{{ $gejala->gejala }}</label>
            </div>
        @endforeach

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mt-5">Proses Diagnosa</button>
        </div>
    </form>
@endsection
