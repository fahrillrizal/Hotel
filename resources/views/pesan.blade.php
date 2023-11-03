<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | PINTU</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="css/style.css">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body class="hold-transition">
    <!-- As a link -->
    @include('layouts.inc_tamu.navbar')

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/hotel.jpeg" class="d-block w-100" style="height: 700px; width:100px;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/lobi2.jpeg" class="d-block w-100" style="height: 700px; width:100px;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/p.jpeg" class="d-block w-100" style="height: 700px; width:100px;" alt="...">
            </div>
        </div>
    </div>
    <h1 class="text-center my-4"><b>Pesan Kamar Hotel </b></h1>
    <style>
        @media print {

            header,
            footer,
            nav,
            .btn--call-to-action,
            button[type="submit"],
            .modal,
            .modal-backdrop {
                display: none !important;
            }

            img {
                max-height: 500px;
            }
        }
    </style>
    @if (!empty(session()->get('data')))
    <script>
        window.onload = () => {
            document.querySelector('button[data-target="#modal-print"').click()
            document.querySelector('#btn-print').addEventListener('click', () => {
                window.print()
            })
            window.onafterprint = () => {
                window.location.reload()
            }
        }
    </script>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal-print">
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modal-print" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1 style="font-family:arial;"><b>Reservasi Kamar Berhasil</b></h1>
                    <p style="font-family:arial;">Cetak bukti Reservasi untuk administrasi selanjutnya, Apakah Anda
                        ingin mencetak bukti Reservasi Kamar?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" id="btn-print">Print</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    <form action="{{ route('pesan.store') }}" method="post" class="card card-primary">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Check In</label>
                        <input label="chek_in" name="chek_in" value="{{!empty(session()->get('data')) ? session()->get('data')->chek_in : ""}}" type="datetime-local" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Check out</label>
                        <input label="chek_out" name="chek_out" value="{{!empty(session()->get('data')) ? session()->get('data')->chek_out : ""}}" type="datetime-local" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Nama Pengguna</label>
                <input label="nama_pengguna" maxlength="20" name="nama_pengguna" value="{{!empty(session()->get('data')) ? session()->get('data')->nama_pengguna : ""}}" type="text" class="form-control" placeholder="Masukkan Nama Pengguna">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input label="email" type="text" name="email" value="{{!empty(session()->get('data')) ? session()->get('data')->email : ""}}" class="form-control" placeholder="Masukkan Email">
            </div>
            <div class="form-group">
                <label>No. Handphone</label>
                <input label="no_hp" type="number" value="{{!empty(session()->get('data')) ? session()->get('data')->no_hp : ""}}" name="no_hp" class="form-control" placeholder="Masukkan No. Hanphone">
            </div>
            <div class="form-group">
                <label>Nama Tamu</label>
                <input label="nama_tamu" type="text" value="{{!empty(session()->get('data')) ? session()->get('data')->nama_tamu : ""}}" name="nama_tamu" class="form-control" placeholder="Masukkan Nama Tamu">
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Type Kamar</label>
                        <select label="kamar_id" name="kamar_id" value="{{!empty(session()->get('data')) ? session()->get('data')->kamar_id : ""}}" class="custom-select">
                            @foreach ($data as $d)
                            <option value="{{$d->id }}" {{!empty(session()->get('data')) && session()->get('data')->kamar_id == $d->id ? "selected" : ""}}>{{$d->type_kamar}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input label="jumlah" name="jumlah" value="{{!empty(session()->get('data')) ? session()->get('data')->jumlah : '' }}" type="number" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#modal-pesan" type="button">
                    <i class="fas fa-save"></i> Konfirmasi Pesanan
                </button>
            </div>
            <div class="modal fade" id="modal-pesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h5 class="modal-title">Perhatian</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda Sudah Yakin Dengan Pesanan Anda ?
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Konfirmasi Pesan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <footer class="footer bg-dark">
        <div class="container">
            <div class="row justify-content-center text-center">
                <span class="text-muted"><strong>Copyright &copy; 2023 Fahril.</strong> All rights reserved.</span>
            </div>
        </div>
    </footer>
    <!-- Modal -->
    <!-- jQuery -->
    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/adminlte/dist/js/adminlte.min.js"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>