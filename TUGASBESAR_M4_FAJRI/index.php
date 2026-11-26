<?php
require_once "koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM donatur ORDER BY id ASC");

if (!$query) {
    die("Gagal mengambil data: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Donatur</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>Data Donatur</h1>
        <p>Daftar data donatur</p>

        <a href="form.php" class="button">Tambah Data Donatur</a>

        <br><br>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Donatur</th>
                    <th>No. Kontak</th>
                    <th>Email</th>
                    <th>Tampilkan</th>
                </tr>
            </thead>

            <tbody>
                <?php if (mysqli_num_rows($query) > 0) { ?>

                    <?php $no = 1; ?>

                    <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($data["nama"]); ?></td>
                            <td><?php echo htmlspecialchars($data["kontak"]); ?></td>
                            <td><?php echo htmlspecialchars($data["email"]); ?></td>
                            <td><?php echo htmlspecialchars($data["tampilkan"]); ?></td>
                        </tr>
                    <?php } ?>

                <?php } else { ?>
                    <tr>
                        <td colspan="5">Belum ada data donatur.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

</body>
</html>