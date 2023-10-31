<?php

    session_start();
    if(!isset($_SESSION['registro'])){
        echo '<script>
                alert("Por favor debes iniciar sesion")
                window.location = "php/index.php"
            </script>';
            session_destroy();
            die();
    }

?>
<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>Data cliente</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light" >
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-yellow bg-orange border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">SAbritas</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="php/php/cerrar_sesion.php">Cerrar Sesion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="php/index.php">Iniciar Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- form tambah cliente -->
        <div class="card mb-5">
            <!-- <div class="card-header">
                Latihan CRUD PHP & MySQL
            </div> -->
            <!-- tambah data -->
            <div class="card-body">
                <h3 class="card-title">registro para el cliente</h3>
                <p class="card-text">aqui se puede registar el cliente para poder pedir cosas mas adelante...</p>

                <!-- tampilkan pesan sukses ditambah -->
                <?php if (isset($_GET['status'])) : ?>
                    <?php
                    if ($_GET['status'] == 'sukses')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Sukses!</strong> Se envio Con exito!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Fracaso!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="tambah.php" method="POST">

                    <div class="col-12">
                        <label for="nombre" class="form-label">nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" required>
                    </div>
                    <div class="col-md-4">
                        <label for="apellido" class="form-label">apellido</label>
                        <input type="text" name="apellido" class="form-control" placeholder="apellido" required>
                    </div>

                    <div class="col-md-4">
                        <label for="estado" class="form-label">estado</label>
                        <select class="form-select" name="estado" aria-label="Default select example">
                            <option value="chihuahua">chihuahua</option>
                            <option value="sonora">sonora</option>
                            <option value="durango">durango</option>
                            <option value="coahuila">coahuila</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="tittle" class="form-label">genero</label>
                        <div class="col-md-12">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="email">Masculino</label>
                                <input class="form-check-input" type="radio" name="email" value="oral">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="email">Femenino</label>
                                <input class="form-check-input" type="radio" name="email" value="topica">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">email</label>
                        <input type="text" name="email" class="form-control" placeholder="email" required>
                    </div>

                    <div class="col-md-6">
                        <label for="edad" class="form-label">edad</label>
                        <input type="number" step=1 name="edad" class=" form-control" placeholder="edad" required>
                    </div>

                    <div class="col-md-6">
                        <label for="contacto" class="form-label">contacto</label>
                        <input type="number" step=1 name="contacto" class=" form-control" placeholder="contacto" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="tambah"><i class="fa fa-plus"></i><span class="ms-2">Enviar</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- judul tabel -->
        <h5 class="mb-3">Tablas</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Mostrar Registros</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Buscar..." aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!-- tampilkan pesan sukses dihapus -->
        <?php if (isset($_GET['hapus'])) : ?>
            <?php
            if ($_GET['hapus'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Sukses!</strong> Se borro!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> No se borro!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tampilkan pesan sukses di edit -->
        <?php if (isset($_GET['update'])) : ?>
            <?php
            if ($_GET['update'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Sukses!</strong> Data berhasil diupdate!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Data gagal diupdate!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabel -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>No</th>";
            echo "<th scope='col'>nombre</th>";
            echo "<th scope='col'>apellido</th>";
            echo "<th scope='col'>Via de administracion</th>";
            echo "<th scope='col'>email</th>";
            echo "<th scope='col'>estado</th>";
            echo "<th scope='col'>edad</th>";
            echo "<th scope='col'>contacto</th>";
            echo "<th scope='col' class='text-center'>Opciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $batas = 10;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = mysqli_query($db, "SELECT * FROM cliente");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            $data_mhs = mysqli_query($db, "SELECT * FROM cliente LIMIT $halaman_awal, $batas");
            $no = $halaman_awal + 1;

            // $sql = "SELECT * FROM cliente";
            // $query = mysqli_query($db, $sql);




            while ($cliente = mysqli_fetch_array($data_mhs)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $cliente['id'] . "</td>";
                echo "<td class='text-center'>" . $no++ . "</td>";
                echo "<td>" . $cliente['nombre'] . "</td>";
                echo "<td>" . $cliente['apellido'] . "</td>";
                echo "<td>" . $cliente['email'] . "</td>";
                echo "<td>" . $cliente['email'] . "</td>";
                echo "<td>" . $cliente['estado'] . "</td>";
                echo "<td>" . $cliente['edad'] . "</td>";
                echo "<td>" . $cliente['contacto'] . "</td>";

                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                // tombol hapus
                echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($jumlah_data == 0) {
                echo "<p class='text-center'>Tabla Vacia</p>";
            } else {
                echo "<p>Total $jumlah_data entri</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($halaman > 1) ? "href='?halaman=$previous'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($halaman < $total_halaman) ? "href='?halaman=$next'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Modal Edit-->
        <div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Edit Data cliente</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM cliente";
                    $query = mysqli_query($db, $sql);
                    $cliente = mysqli_fetch_array($query);
                    ?>

                    <form action='edit.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_id' id='edit_id'>

                            <div class="col-12 mb-3">
                                <label for="edit_nombre" class="form-label">nombre</label>
                                <input type="text" name="edit_nombre" id="edit_nombre" class="form-control" placeholder="Nombre Completo" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_apellido" class="form-label">apellido</label>
                                <input type="text" name="edit_apellido" id="edit_apellido" class="form-control" placeholder="G64190021" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_estado" class="form-label">estado</label>
                                <select class="form-select" name="edit_estado" id="edit_estado" aria-label="Default select example">
                                <option value="chihuahua">chihuahua</option>
                            <option value="sonora">sonora</option>
                            <option value="durango">durango</option>
                            <option value="coahuila">coahuila</option>
                                </select>
                            </div>


                            <div class="col-12 mb-3">
                                <label for="edit_email" class="form-label">Via de administracion</label>
                                <div class="col-md-12" id="gender">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="genero">
                                            <input class="form-check-input" type="radio" name="edit_email" value="masculino" id="cowok">masculino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="genero">
                                            <input class="form-check-input" type="radio" name="edit_email" value="femenino" id="cewek">femenino</label>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12 mb-3">
                                <label for="edit_urusan" class="form-label">email</label>
                                <input type="text" name="edit_email" class="form-control" id="edit_email" placeholder="Ilmu Komputer" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_edad" class="form-label">edad</label>
                                <input type="number" step=1 name="edit_edad" id="edit_edad" class=" form-control" placeholder="3.52" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_contacto" class="form-label">contacto</label>
                                <input type="number" name="edit_contacto" id="edit_contacto" class=" form-control" placeholder="3.52" required>
                            </div>

                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='edit_data' class='btn btn-primary'>subir</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- Modal Delete-->
        <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmacion</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='hapus.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='delete_id' id='delete_id'>
                            <p>Desea Borrar?
                            </p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='deletedata' class='btn btn-primary'>Confirmar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- tutup container -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- edit function -->
    <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#edit_id').val(data[0]);
                // gak dipake, karena cuma increment number
                // $('#no').val(data[1]);
                $('#edit_nombre').val(data[2]);
                $('#edit_apellido').val(data[3]);
                $('#gender').val(data[4]);
                // Via de administracion checked
                if (data[4] == "oral") {
                    $("#cowok").prop("checked", true);
                } else {
                    $("#cewek").prop("checked", true);
                }

                $('#edit_email').val(data[5]);
                $('#edit_estado').val(data[6]);
                $('#edit_edad').val(data[7]);
                $('#edit_contacto').val(data[8]);
            });
        });
    </script>

    <!-- delete function -->
    <script>
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#delete_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>
<h3> <a href="https://barriosrosalesjosue465.github.io/proyecto_nava/webMaster.html">josue gustavo barrios rosales</a> </h3>
</html>