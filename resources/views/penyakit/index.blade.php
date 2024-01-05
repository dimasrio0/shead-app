@extends('layouts.app')

@section('content')
    <h2 class="h3 my-5 text-black">Daftar Penyakit</h2>
    @if (!Auth::user())
        <div class="accordion" id="accordionPenyakit">
            @php
                $i = 0;
            @endphp
            @foreach ($penyakit as $p)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $p->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $p->id }}" aria-expanded="true"
                            aria-controls="collapse{{ $p->id }}">
                            {{ $p->nama_penyakit }}
                        </button>
                    </h2>
                    <div id="collapse{{ $p->id }}" class="accordion-collapse collapse"
                        aria-labelledby="heading{{ $p->id }}" data-bs-parent="#accordionPenyakit">
                        <div class="accordion-body">
                            <strong>{{ $p->keterangan }}</strong><br>
                            <strong>Gejala :</strong><br>
                            <ol style="padding-left: 18px">
                                @foreach ($p->gejala as $gejala)
                                    <li style="list-style: decimal;">{{ $gejala->gejala }}</li>
                                @endforeach
                            </ol>
                            <strong>Solusi : </strong><br>
                            {!! $p->solusi !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="container border bg-blue">
            <a href="{{ route('penyakit.create') }}" class="btn btn-primary">Tambah Penyakit</a>
            @if (session('success'))
                <div class="alert alert-success" role="alert" style="margin-top: -50px">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-hover border" style="margin-top: -50px" id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Penyakit</th>
                        <th>Penjelasan</th>
                        <th>Solusi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($penyakit as $p)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $p->nama_penyakit }}</td>
                            <td>{{ $p->keterangan }}</td>
                            <td>{!! $p->solusi !!}</td>
                            <td class="d-flex align-items-center">
                                <a href="{{ route('penyakit.edit', $p->id) }}" class="d-flex align-items-center me-3 text-success">
                                    <i class="fa fa-edit me-2"></i>Edit</a>
                                <form action="{{ route('penyakit.destroy', $p->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
