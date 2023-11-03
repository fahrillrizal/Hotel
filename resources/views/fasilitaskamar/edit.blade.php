@extends('layouts.admin', ['title' => 'Edit Fasilitas Kamar'])

@section('content-header')
    <h1 class="m=0"> <i class="fas fa-air-freshener"></i>Fasilitas Kamar</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <x-form-edit :action="route('fasilitaskamar.update', $row->id)" :upload="true">
                <x-input label="Nama Fasilitas" name="nama_fasilitas" :value="$row->nama_fasilitas" />
            </x-form-create>

        </div>
    </div>
@endsection
