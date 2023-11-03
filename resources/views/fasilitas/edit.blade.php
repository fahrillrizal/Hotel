@extends('layouts.admin',['title'=>'Edit Fasilitas'])

@section('content-header')
<h1 class="m-0"><i class="fas fa-building"></i>Fasilitas</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-6">
        <x-form-edit :action="route('fasilitas.update',['fasilita'=>$row->id])" :upload="true">
            <x-input label="Fasilitas" name="fasilitas" :value="$row->fasilitas" />
            @if($row->foto_fasilitas)
            <div class="form-group">
                <img src="{{ url('images/fasilitas/'.$row->foto_fasilitas) }}" class="img-fluid">
            </div>
            @endif
            <x-input label="Foto" name="foto_fasilitas" type="file" keterangan="Foto harus berformat: png, jpg, jpeg. Ukuran: min 50kb max 1mb" />
            <x-textarea label="Deskripsi" name="deskripsi_fasilitas" :value="$row->deskripsi_fasilitas" />
        </x-form-edit>
    </div>
</div>
@endsection