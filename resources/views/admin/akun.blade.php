@extends('layouts.admin',['title'=>'Akun'])

@section('content-header')
<h1 class="m-0"><i class="fas fa-user-cog"></i>Akun</h1>
@endsection

@section('content')

<x-status />

<div class="row">
    <div class="col-6">
        <x-form-edit :action="route('admin.akun')" :header="false">
            <x-input label="Nama" name="nama" :value="$row->nama" />
            <x-input label="Email" name="email" :value="$row->email" />
            <x-input label="Password" name="password" type="password" />
            <x-input label="Konfirmasi Password" name="password_confirmation" type="password" />
        </x-form-edit>
    </div>
</div>
@endsection