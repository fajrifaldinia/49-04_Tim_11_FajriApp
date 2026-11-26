<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donatur</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <img src="{{ asset('Peduli_Sosial.png') }}" alt="Logo" height="42">
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="form-container">

            <h2>Edit Donatur</h2>
            <p class="form-description">
                Ubah informasi donatur sesuai kebutuhan.
            </p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ $formAction }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama">Nama Donatur</label>
                    <input type="text" id="nama" name="nama"
                        value="{{ old('nama', $donatur->nama) }}" required>
                </div>

                <div class="form-group">
                    <label for="kontak">Nomor Kontak</label>
                    <input type="text" id="kontak" name="kontak"
                        value="{{ old('kontak', $donatur->kontak) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email"
                        value="{{ old('email', $donatur->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="tampilkan">Tampilkan Nama</label>
                    <select id="tampilkan" name="tampilkan" required>
                        <option value="Ya"
                            {{ old('tampilkan', $donatur->tampilkan) == 'Ya' ? 'selected' : '' }}>
                            Ya, tampilkan nama saya
                        </option>

                        <option value="Tidak"
                            {{ old('tampilkan', $donatur->tampilkan) == 'Tidak' ? 'selected' : '' }}>
                            Tidak, tampilkan sebagai anonim
                        </option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>

                    <a href="{{ $backRoute }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </form>

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