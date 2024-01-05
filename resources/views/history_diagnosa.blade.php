@extends('layouts.app')

@section('content')
    <h2 class="h3 my-5 text-black">List History Diagnosa</h2>
    <div class="container border bg-blue">
        <table class="table table-hover border" style="margin-top: -50px" id="myTable">
            <thead>
                <tr>
                    <th>Tanggal Diagnosa</th>
                    <th>Gejala Yang Ikan Anda Alami</th>
                    <th>Kemungkinan Penyakit</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($historyDiagnosa as $item)
                    <tr>
                        <td>{{ $item->tanggal_diagnosa }}</td>
                        <td>
                            <ol>
                                @foreach ($item->penyakit->gejala as $p)
                                    <li style="list-style: decimal">{{ $p->gejala }}</li>
                                @endforeach
                            </ol>
                        </td>
                        <td>{{ $item->penyakit->nama_penyakit }}</td>
                        <td>{{ $item->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
