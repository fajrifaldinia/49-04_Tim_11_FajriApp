<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Donatur</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('Peduli_Sosial.png') }}" alt="Logo" height="42">
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="table-container">

            <div class="table-header">
                <h2>Daftar Donatur</h2>

                <a href="{{ route('admin.donatur.create') }}" class="btn btn-primary">
                    + Tambah Donatur
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Tampilkan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($donatur as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->kontak }}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                @if (strtolower($data->tampilkan) == 'ya')
                                    <span class="badge-public">Ya</span>
                                @elseif (strtolower($data->tampilkan) == 'tidak')
                                    <span class="badge-anonim">Tidak</span>
                                @else
                                    {{ $data->tampilkan }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('donatur.edit', $data->id) }}"
                                    class="btn btn-edit">
                                    Edit
                                </a>

                                <form action="{{ route('donatur.destroy', $data->id) }}"
                                    method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-delete"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                Belum ada data donatur.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                Kembali ke Dashboard
            </a>

        </div>
    </div>

    <footer class="bg-dark text-light pt-4 pb-3 mt-5 border-top border-warning border-3">
        <div class="container text-center">
            <small class="text-secondary">
                Copyright © 2026 Peduli Sosial. All rights reserved.
            </small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>