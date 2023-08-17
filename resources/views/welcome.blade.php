@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik - Your Health, Our Priority</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class=" text-white text-center py-5">
        <div class="container">
            <h1 class="display-4 mb-4">Selamat Datang</h1>
            <p class="lead">Kesehatan Anda Adalah Prioritas Kami</p>
            @guest
            <a href="/login" class="btn btn-light btn-lg">Ambil Nomor Antrian</a>
            @else
                @if (auth()->user()->type === 'user')
                    <a class="btn btn-light btn-lg" href="{{ route('home') }}">Ambil Nomor Antrian</a>
                @elseif (auth()->user()->type === 'admin')
                    <a class="btn btn-light btn-lg" href="{{ route('admin.home') }}">Kelola Antrian</a>
                @endif
            @endguest
        </div>
    </div>

    <section class="py-5">
        <div style="color: azure;" class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mb-4">Kualitas Pelayanan Kesehatan</h2>
                    <p style="text-align: justify;">Konsep kualitas pelayanan kesehatan merupakan landasan fundamental dalam memberikan perawatan dan layanan medis yang berkualitas kepada individu yang membutuhkan. Kualitas pelayanan kesehatan tidak hanya mencakup aspek teknis medis, tetapi juga mencakup dimensi empati, etika, komunikasi, efisiensi, dan kepuasan pasien. Konsep ini memandang pasien sebagai pusat perhatian, menekankan pada pengalaman positif pasien serta hasil perawatan yang optimal.</p>
                    <p style="text-align: justify;">Aspek utama dalam konsep kualitas pelayanan kesehatan adalah keamanan pasien. Pelayanan kesehatan yang berkualitas harus memberikan jaminan keamanan dalam segala aspek, mulai dari diagnosa, perawatan, hingga pemberian obat-obatan. Keamanan pasien juga mencakup pencegahan infeksi nosokomial, identifikasi pasien yang akurat, serta penggunaan teknologi medis yang aman.</p>
                </div>
                <div class="col-md-6">
                    <img src="img/5.jpg" alt="Clinic Image" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
