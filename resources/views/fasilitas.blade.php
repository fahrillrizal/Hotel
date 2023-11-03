@extends('home',['title'=>'Fasilitas'])

@section('content')

<h1 class="text-center my-4">Fasilitas</h1>
<p class="text-center my-4">Kami mempunyai berbagai fasilitas</p>
<div class="card-inner" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="200" data-aos-offset="0">
    <div class="row gy-4">
        @foreach ($data as $i)
        <div class="col-4">
            <div class="gallery card">
                <a class="gallery-image popup-image" href="/images/fasilitas/{{ $i->foto_fasilitas }}">
                    <img class="w-100 rounded-top" src="/images/fasilitas/{{ $i->foto_fasilitas }}" style="height: 225px; width: 150px;">
                </a>
                <div class="card-body">
                    <h4 class="text-center"><span class="lead-text">{{ $i->fasilitas }}</span></h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection