<?php
session_start();
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$nama = trim($_POST["nama"] ?? "");
$kontak = trim($_POST["kontak"] ?? "");
$email = trim($_POST["email"] ?? "");
$Tampilkan = $_POST["Tampilkan"] ?? "";

$errors = [];

if ($nama === "") {
    $errors[] = "Nama wajib diisi.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email tidak valid.";
}

if ($kontak === "" || !ctype_digit($kontak)) {
    $errors[] = "Nomor kontak harus berupa angka.";
}

if (!in_array($Tampilkan, ["Ya", "Tidak"], true)) {
    $errors[] = "Pilih Ya atau Tidak.";
}

if (!empty($errors)) {
    $_SESSION["errors"] = $errors;
    $_SESSION["old"] = [
        "nama" => $nama,
        "kontak" => $kontak,
        "email" => $email,
        "Tampilkan" => $Tampilkan
    ];

    header("Location: form.php");
    exit;
}

$sql = "INSERT INTO donatur (nama, kontak, email, tampilkan)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Query gagal: " . mysqli_error($conn));
}

mysqli_stmt_bind_param(
    $stmt,
    "ssss",
    $nama,
    $kontak,
    $email,
    $Tampilkan
);

if (!mysqli_stmt_execute($stmt)) {
    die("Data gagal disimpan: " . mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);

header("Location: index.php");
exit;
?>