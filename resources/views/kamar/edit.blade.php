@extends('layouts.admin',['title'=>'Edit Kamar'])

@section('content-header')
<h1 class="m-0"><i class="fas fa-bed"></i>Kamar</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-6">
        <x-form-edit :action="route('kamar.update',['kamar'=>$row->id])" :upload="true">
            <x-input label="Type Kamar" name="type_kamar" :value="$row->type_kamar" />
            @if($row->foto_kamar)
            <div class="form-group">
                <img src="{{ url('images/kamar/'.$row->foto_kamar) }}" class="img-fluid">
            </div>
            @endif
            <x-input label="Foto" name="foto_kamar" type="file" keterangan="Foto harus berformat: png, jpg, jpeg. Ukuran: min 50kb max 1mb" />
            <x-input label="Jumlah" name="jumlah_kamar" type="number" :value="$row->jumlah_kamar" />
            <x-input label="Harga per malam" name="harga" type="number" :value="$row->harga" />
            <label for="">Fasilitas</label>
                <div class="fasilitas d-flex flex-wrap">
                    @foreach($fasilitas as $fasilita)
                    <label for="fasilitas-{{$fasilita->id}}" class="mx-2"><input id="fasilitas-{{$fasilita->id}}" {{ in_array($fasilita->nama_fasilitas ,$f_check) ? 'checked' : '' }} type="checkbox" name="fasilitas[]" value="{{$fasilita->nama_fasilitas}}" /> {{$fasilita->nama_fasilitas}}</label>
                    @endforeach
                </div>
            <x-textarea label="Deskripsi" name="deskripsi_kamar" :value="$row->deskripsi_kamar" />
        </x-form-edit>
    </div>
</div>
@endsection