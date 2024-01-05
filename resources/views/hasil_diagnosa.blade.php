<!-- resources/views/hasil_diagnosa.blade.php -->

@extends('layouts.app')

@section('content')
    <h2 class="h3 my-5">Hasil Diagnosa Penyakit Ikan</h2>

    @if ($penyakit)
        <table class="table table-striped border w-75 mx-auto">
            <tr>
                <td>Nama Penyakit</td>
                <td>{{ $penyakit->nama_penyakit }}</td>
            </tr>
            <tr>
                <td>Gejala</td>
                <td>
                    <ol style="padding-left: 18px">
                        @foreach ($penyakit->gejala as $item)
                            <li style="list-style: decimal;">{{$item->gejala}}</li>
                        @endforeach
                    </ol>
                </td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>{{ $penyakit->keterangan }}</td>
            </tr>
            <tr>
                <td>Solusi</td>
                <td>{!! $penyakit->solusi !!}</td>
            </tr>
        </table>
    @else
        <p>Tidak ditemukan penyakit berdasarkan gejala yang dipilih.</p>
    @endif
@endsection
