<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_data'])) {
    // ambil data dari form
    $id = $_POST['edit_id'];
    $nama = $_POST['edit_nama'];
    $apellido = $_POST['edit_apellido'];
    $estado = $_POST['edit_estado'];
    $email = $_POST['edit_email'];
    $estado = $_POST['edit_estado'];
    $edad = $_POST['edit_edad'];
    $contacto = $_POST['edit_contacto'];


    // query
    $sql = "UPDATE cliente SET nama='$nama', apellido='$apellido', email='$estado', email='$email', estado='$estado', edad='$edad'
    , contacto='$contacto' WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./index.php?update=sukses');
    else
        header('Location: ./index.php?update=gagal');
} else
    die("Akses dilarang...");
