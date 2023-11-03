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

    <div class="container content">
        @yield('content')



        <hr>


        <!-- Kamar -->


    </div>
    </div>
    </div>

        <div data-aos="fade-up" data-aos-duration="1000">
            <h1 class="text-center my-4">Tentang Kita</h1>
            <p style="margin-left: 60px;">Lepaskan diri Anda ke Hotel Pintu, dikelilingi oleh keindahan pegunungan, danau dan sawah. Nikmati sore yang hangat dengan berenang di kolam renang dengan pemandangan matahari terbenam yang memukau. Kid’s club/Ruang bermain anak yang luas & menawarkan berbagai fasilitas dan kegiatan anak-anak yang melengkapi kenyamanan keluarga. Convention Center kami dilengkapi pelayanan lengkap dan mampu menampung 3.000 orang.</p>
        </div>
    </div>
    </div>

    <footer class="footer bg-dark">
        <div class="container">
            <div class="row justify-content-center text-center">
                <span class="text-muted"><strong>Copyright &copy; 2023 Fahril.</strong> All rights reserved.</span>
            </div>
        </div>
    </footer>

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