<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>"Energy Data  interface"</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <script src="../public/js/sweetalert2@11.js"></script>
    <link rel="stylesheet" href="../public/css/registros.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <?php
        session_start();
        if (isset($_SESSION['mensaje'])) {
            $respuesta = $_SESSION['mensaje'];
        ?>
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '<?php echo $respuesta; ?>',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        <?php
        }
        ?>

        <br>
        <div class="card card-outline card-info">

            <div class="card-body">
               

                <form action="../app/controllers/login/ingreso.php" method="post">
                <center>
                    <img src="../public/images/fondo.gif" alt="imagen ventas" width="300px">
                </center>
                <div class="input-group mb-3">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password_user" id="password_user" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-info btn-block">Ingresar</button>
                        </div>
                        <div class="col-12">
                            <a href="../cuenta/create.php">Crear cuenta</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->

</body>

</html>