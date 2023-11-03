@extends('layouts.admin',['title'=>'Fasilitas'])

@section('content-header')
<h1 class="m-0"><i class="fas fa-building"></i> Fasilitas</h1>
@endsection

@section('content')
<x-status />

<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col">
        <x-btn-create-k :link="route('fasilitas.create')" />
      </div>
      <div class="col">
        <x-search />
      </div>
    </div>
  </div>
  <x-card-table>
    <thead>
      <tr>
        <th>No.</th>
        <th>Foto</th>
        <th>Fasilitas</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      @foreach($data as $row)
      <tr>
        <td>{{$no++}}</td>
        <td><img src="{{ url('images/fasilitas/'.$row->foto_fasilitas) }}" width="100"></td>
        <td>{{ucwords($row->fasilitas)}}</td>
        <td>
          <x-btn-edit :link="route('fasilitas.edit',$row->id)" />
          <x-btn-delete :link="route('fasilitas.destroy',$row->id)" />
        </td>
      </tr>
      @endforeach
    </tbody>
  </x-card-table>
  <div class="card-body pb-0">
    {{ $data->appends(['search'=> request()->search])->links() }}
  </div>
</div>
@endsection

@section('modal')
<x-modal-delete />
@endsection