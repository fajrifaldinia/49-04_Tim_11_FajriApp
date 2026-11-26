<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Donatur</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <img src="{{ asset('Peduli_Sosial.png') }}" alt="Logo" height="42">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning fw-bold" href="{{ url('/programs') }}">
                            <i class="fas fa-cog"></i> Kelola Program
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Dashboard -->
    <div class="container">
        <div class="table-container">

            <h1>Dashboard Donatur</h1>

            <p>Selamat datang di halaman Donatur Sistem Crowdfunding.</p>

            <h3>Data Donatur Saya</h3>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('info'))
                <div class="alert alert-info">
                    {{ session('info') }}
                </div>
            @endif

            @if ($donatur)
                <p>Berikut adalah data donatur milik Anda.</p>

                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $donatur->nama }}</td>
                    </tr>
                    <tr>
                        <th>Kontak</th>
                        <td>{{ $donatur->kontak }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $donatur->email }}</td>
                    </tr>
                    <tr>
                        <th>Tampilkan</th>
                        <td>{{ $donatur->tampilkan }}</td>
                    </tr>
                </table>

                <a href="{{ route('donatur.edit-own') }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Edit Data
                </a>

            @else
                <p>Anda belum mengisi data donatur.</p>

                <a href="{{ route('donatur.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Data Donatur
                </a>
            @endif

            <br><br>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-delete">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>

        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light pt-4 pb-3 mt-5 border-top border-warning border-3">
        <div class="container text-center">
            <small class="text-secondary">
                Copyright &copy; 2026 Peduli Sosial. All rights reserved.
            </small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>