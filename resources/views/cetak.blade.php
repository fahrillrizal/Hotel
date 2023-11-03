<script>
    window.onload = () => {
        window.print()
        window.onafterprint = () => {
            window.location.assign('/pesan')
        }
    }
    </script>
    <style>
    @media print {
        @page {
            margin-left: 0.5in;
            margin-right: 0.5in;
            margin-top: 0;
            margin-bottom: 0;
        }
    }
    </style>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ isset($title) ? $title.' | '.config('app.name') : config('app.name')}}</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">

        <link rel="stylesheet" href="/css/style.css">

    </head>
    <div class="row justify-content-md-center">
        <h1 class="text-center font-weight-bold">Data Pemesanan</h1>
    </div>
    <div class="card-body p-5">
        <div class="table-responsive">
            <table class="table table-hover ">

                <tbody>
                    <tr>
                        <th style="width:30%">Nama Pengguna</th>
                        <td>{{$data->nama_pengguna}}</td>
                    </tr>
                    <tr>
                        <th style="width:30%">Email</th>
                        <td>{{$data->email}}</td>
                    </tr>
                    <tr>
                        <th style="width:30%">No HP</th>
                        <td>{{$data->no_hp}}</td>
                    </tr>
                    <tr>
                        <th style="width:30%">Nama Tamu</th>
                        <td>{{$data->nama_tamu}}</td>
                    </tr>
                    <tr>
                        <th style="width:30%">Check In</th>
                        <td>{{$data->chek_in}}</td>
                    </tr>
                    <tr>
                        <th style="width:30%">Check Out</th>
                        <td>{{$data->chek_out}}</td>
                    </tr>
                    <tr>
                        <th style="width:30%">Tipe Kamar</th>
                        <td>{{$data->kamar_id}}</td>
                    </tr>
                    <tr>
                        <th style="width:30%">Jumlah</th>
                        <td>{{$data->jumlah}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    </div>

    <!-- jQuery -->
    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/adminlte/dist/js/adminlte.min.js"></script>
