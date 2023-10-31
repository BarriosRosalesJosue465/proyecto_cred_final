<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['tambah'])) {
    // ambil data dari form
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $estado = $_POST['estado'];
    $email= $_POST['email'];
    $genero = $_POST['genero'];
    $edad = $_POST['edad'];
    $contacto = $_POST['contacto'];

    // query
    $sql = "INSERT INTO cliente(nombre, apellido,genero, email, estado, edad,contacto)
    VALUES('$nombre', '$apellido', '$genero', '$email', '$estado', '$edad', '$contacto')";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./index.php?status=sukses');
    else
        header('Location: ./index.php?status=gagal');
} else
    die("No cargo");

    