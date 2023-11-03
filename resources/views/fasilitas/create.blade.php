@extends('layouts.admin', ['title' => 'Tambah fasilitas'])

@section('content-header')
    <h1 class="m-0"><i class="fas fa-building"></i> Fasilitas</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <x-form-create :action="route('fasilitas.store')" :upload="true">
                <x-input label="Fasilitas" name="fasilitas" />
                <x-input label="Foto" name="foto_fasilitas" type="file"
                    keterangan="Foto harus berformat: png, jpg, jpeg. Ukuran: min 50kb max 1mb" />
                <x-textarea label="Deskripsi" name="deskripsi_fasilitas" />
            </x-form-create>
        </div>
    </div>
@endsection
