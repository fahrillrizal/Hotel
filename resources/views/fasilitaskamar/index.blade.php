@extends('layouts.admin',['title'=>'Fasilitas Kamar'])

@section('content-header')
<h1 class="m=0"> <i class="fas fa-air-freshener"></i>Fasilitas Kamar</h1>
@endsection

@section('content')

<x-status />

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <x-btn-create-k :link="route('fasilitaskamar.create')" />
            </div>
        
    </div>
    <x-card-table :id="__('table')">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Fasilitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = $data->firstItem();?>
                @foreach ( $data as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ ucwords($row->nama_fasilitas) }}</td>
                    <td>
                        <x-btn-edit :link="route('fasilitaskamar.edit',$row->id)"/>
                            <a>|</a>
                        <x-btn-delete :link="route('fasilitaskamar.destroy',$row->id)" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </x-card-table>
        </table>
    </div>
    
</div>

@endsection

@section('modal')
<x-modal-delete/>
@endsection
