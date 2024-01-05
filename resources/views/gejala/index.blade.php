@extends('layouts.app')

@section('content')
    <h2 class="h3 my-5 text-black">Daftar Gejala</h2>
    <div class="container border">
        <a href="{{ route('gejala.create') }}" class="btn btn-primary">Tambah gejala</a>
        @if (session('success'))
            <div class="alert alert-success" role="alert" style="margin-top: -50px">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-hover border" style="margin-top: -50px" id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Penyakit Yang Related Ke Gejala</th>
                    <th>gejala</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($gejala as $p)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $p->penyakit->nama_penyakit }}</td>
                        <td>{{ $p->gejala }}</td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('gejala.edit', $p->id) }}"
                                class="d-flex align-items-center me-3 text-success">
                                <i class="fa fa-edit me-2"></i>Edit</a>
                            <form action="{{ route('gejala.destroy', $p->id) }}" method="POST" style="display:inline">
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
@endsection
