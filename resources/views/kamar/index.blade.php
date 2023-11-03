@extends('layouts.admin',['title'=>'Kamar'])

@section('content-header')
<h1 class="m-0"><i class="fas fa-bed"></i> Kamar</h1>
@endsection

@section('content')
<x-status />

<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col">
        <x-btn-create-k :link="route('kamar.create')" />
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
        <th>Type Kamar</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      @foreach($data as $row)
      <tr>
        <td>{{$no++}}</td>
        <td><img src="{{ url('images/kamar/'.$row->foto_kamar) }}" width="100"></td>
        <td>{{ucwords($row->type_kamar)}}</td>
        <td>Rp.{{number_format($row->harga,2,',','.')}}</td>
        <td>{{$row->jumlah_kamar}}</td>
        <td>
          <x-btn-edit :link="route('kamar.edit',['kamar'=>$row->id])" />
          <x-btn-delete :link="route('kamar.destroy',['kamar'=>$row->id])" />
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