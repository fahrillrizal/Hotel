@extends('layouts.admin',['title'=>'Tambah Pengguna'])

@section('content-header')
<h1 class="m-0"><i class="fas fa-users"></i> User Admin</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-6">
        <x-form-create :action="route('admin.store')">
            <x-input label="Nama" name="nama" />
            <x-input label="Email" name="email" />
            <x-input label="Password" name="password" type="password" />
            <x-input label="Konfirmasi Password" name="password_confirmation" type="password" />
        </x-form-create>
    </div>
</div>
@endsection