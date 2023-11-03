@extends('home',['title'=>'Kamar'])

@section('content')

<div class="container content">
    <h1 class="text-center my-4">Tipe Kamar</h1>
    <p class="text-center my-4">Kami menyediakan kamar untuk single, pasangan maupun keluarga </p>
        <div class="card-inner" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="200" data-aos-offset="0">
            <div class="row gy-4">
                @foreach ($data as $i)
                <div class="col-4">
                    <div class="gallery card">
                        <a class="gallery-image popup-image" href="/images/kamar/{{ $i->foto_kamar }}">
                            <img class="w-100 rounded-top" src="/images/kamar/{{ $i->foto_kamar }}" style="height: 225px; width: 150px;">
                        </a>
                            <div class="card-body">
                                <h4><span class="lead-text">{{ $i->type_kamar }}</span></h4>
                                <p class="card-text"><span class="lead-text">Rp.{{ $i->harga}}/<i class="far fa-moon"></i></span></p>
                <span class="badge badge-info">{{$i->fasilitas}}</span>
                <h6>
                        @if($i->jumlah_kamar >5)
                        <span class="badge badge-pill badge-primary">Ada | {{$i->jumlah_kamar}}</span>
                        @elseif($i->jumlah_kamar >0)
                        <span class="badge badge-pill badge-warning">Hampir Penuh | {{$i->jumlah_kamar}}</span>
                        @else($i->jumlah_kamar = 0)
                        <span class="badge badge-pill badge-danger">Penuh | {{$i->jumlah_kamar}}</span>
                        @endif
                </h6>
                            </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endsection