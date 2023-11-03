@extends('layouts.admin',['title'=>'User Admin'])

@section('content-header')
<h1 class="m-0"><i class="fas fa-users"></i> User Admin</h1>
@endsection

@section('content')
<x-status />

<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col">
        <x-btn-create :link="route('admin.create')" />
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
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      @foreach($data as $row)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$row->nama}}</td>
        <td>{{$row->email}}</td>
        <td>{{$row->role}}</td>
        <td>
          <x-btn-edit :link="route('admin.edit',$row->id)" />
          <x-btn-delete :link="route('admin.destroy',$row->id)" />
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