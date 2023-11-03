@extends('layouts.admin',['title'=>'Dashboard'])

@section('content-header')
<h1 class="mb-2"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
@endsection

@section('content')
<x-status />

<h2>Selamat datang {{ Auth::user()->nama }}!</h2>
@endsection
