@extends('layouts.app')

@section('content')
    <div class="slider_wrapper ">
        <div id="camera_wrap" class="">
            <div data-src="{{ asset('assets/images/slide.jpg') }}">
                <div class="caption fadeIn">
                    <h2>White Spot</h2>
                </div>
            </div>
            <div data-src="{{ asset('assets/images/slide1.webp') }}">
                <div class="caption fadeIn">
                    <h2>Bakteri (Aeromonas punctata dan Pseudomonas flurescens)</h2>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="container_12">
            @php
                $i = 0;
            @endphp
            @foreach ($penyakit as $p)
                @php
                    $i++;
                @endphp
                <div class="grid_6">
                    <div class="block1">
                        <img src="{{ asset("assets/images/page1_img$i.jpg") }}" alt="">
                        <div class="title">{{ $p->nama_penyakit }}</div>{{ $p->keterangan }}
                        <br>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
