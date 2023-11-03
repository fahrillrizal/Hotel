@extends('layouts.admin',['title'=>'Reservasi'])

@section('content-header')
<h1 class="m=0"><i class="fas fa-book"></i>Reservasi</h1>
@endsection

@section('content')

<x-status />

<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="">
                <script>
                let formFilter = document.querySelector('form#filter')
                let date = formFilter.querySelector('#check_in')
                date.onchange = ()=> {
                    date.value = date.value
                    formFilter.submit()
                }

                window.onload = ()=> {
                    setTimeout(() => {
                        let table = document.querySelector('#table_wrapper')
                        table.querySelector('.col-sm-12.col-md-6').appendChild(formFilter)
                    }, 200);
                }
                </script>
                <form action="" method="get" id="filter" class="d-inline">
                    <div class="form-group">

                        <label for="check_in">CheckInFilter <input type="date" class="form-control"
                                name="check_in_filter" id="check_in"></label>
                        <button type="submit" class="btn btn-danger">filter</button>
                        {{-- <button type="reset" class="btn btn-danger">Hapus</button> --}}

                    </div>

                </form>
            </div>
        </div>
        <x-card-table :id="__('table')">
            <thead>
                <tr>
                    <th>Nama Pengguna</th>
                    <th>Email</th>
                    <th>No. Handphone</th>
                    <th>Nama Tamu</th>
                    <th>Tipe Kamar</th>
                    <th>Check in</th>
                    <th>Check out</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $data as $d)
                <tr>
                    <td>{{$d->nama_pengguna}}</td>
                    <td>{{$d->email}}</td>
                    <td>{{$d->no_hp}}</td>
                    <td>{{$d->nama_tamu}}</td>
                    <td>{{$d->kamar->type_kamar}}</td>
                    <td>{{$d->chek_in}}</td>
                    <td>{{$d->chek_out}}</td>
                    <td>{{$d->jumlah}}</td>
                    <td>
                        @if($d->confirm == 0)
                        <form action="{{route('reservasi.confirm',$d->id)}}" method="post">
                            @method('put')
                            <button type="submit" class="btn btn-success btn-sm">Check-in</button>
                        </form>
                        @elseif($d->confirm == 1)
                        <form action="{{route('reservasi.reject',$d->id)}}" method="post">
                            @method('put')
                            <button type="submit" class="btn btn-danger btn-sm">Check-out</button>
                        </form>
                        @endif
                        @if($d->confirm == 2 || !$d->confirm)

                        <form action="{{route('reservasi.destroy',$d->id)}}" method="post">
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </x-card-table>
        </table>
    </div>
</div>

@endsection
