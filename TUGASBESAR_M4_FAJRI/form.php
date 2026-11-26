<?php
session_start();

$errors = $_SESSION["errors"] ?? [];
$old = $_SESSION["old"] ?? [];

unset($_SESSION["errors"], $_SESSION["old"]);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Donatur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container form-container">
        <h1>Form Data Donatur</h1>
        <p class="description">Silakan isi data donatur</p>

        <?php foreach ($errors as $error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endforeach; ?>

        <form action="proses.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama Donatur</label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    placeholder="Masukkan nama donatur"
                    value="<?= htmlspecialchars($old["nama"] ?? "") ?>"
                >
            </div>

            <div class="form-group">
                <label for="kontak">No. Kontak</label>
                <input
                    type="text"
                    id="kontak"
                    name="kontak"
                    placeholder="Masukkan nomor kontak"
                    value="<?= htmlspecialchars($old["kontak"] ?? "") ?>"
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="text"
                    id="email"
                    name="email"
                    placeholder="Masukkan email"
                    value="<?= htmlspecialchars($old["email"] ?? "") ?>"
                >
            </div>

            <div class="form-group">
                <label>Tampilkan</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="Tampilkan" value="Ya"
                            <?= ($old["Tampilkan"] ?? "") === "Ya" ? "checked" : "" ?>>
                        Ya
                    </label>

                    <label>
                        <input type="radio" name="Tampilkan" value="Tidak"
                            <?= ($old["Tampilkan"] ?? "") === "Tidak" ? "checked" : "" ?>>
                        Tidak
                    </label>
                </div>
            </div>

            <div class="button-group">
                <button type="submit">Simpan</button>
                <a href="index.php" class="button secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>