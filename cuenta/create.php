<?php
include("../app/config.php");
include('../app/controllers/roles/listado_de_roles.php');
?>
<link rel="stylesheet" href="../public/css/registros.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <h1 class="title is-1">Crear cuenta</h1>
                </div><!-- /.column -->
            </div><!-- /.columns -->
        </div><!-- /.container -->
    </div><!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="columns">
                <div class="column is-4">
                    <div class="card">


                        <div class="card-content">
                            <div class="columns">

                                <div class="column">
                                    <form action="../app/controllers/usuarios/create.php" method="post">
                                        <div class="field">
                                            <label for="nombres" class="label">Nombres</label>
                                            <input type="text" class="input" name="nombres" placeholder="Nombre de nuevo usuario" required />
                                        </div>
                                        <div class="field">
                                            <label for="email" class="label">Email</label>
                                            <input type="email" class="input" name="email" placeholder="@email.com" required />
                                        </div>
                                        <div class="field">
                                            <label for="dispositivo_codigo" class="label">ID del dispositivo</label>
                                            <input type="text" class="input" name="dispositivo_codigo" placeholder="xxxxxxxx" required />
                                        </div>
                                        <div class="field">
                                            <label for="rol" class="label">Tipo</label>
                                            <div class="control">
                                                <div class="select">
                                                    <select name="id_rol">
                                                        <?php foreach ($roles_datos as $rol_dato) :
                                                        
                                                        ?>

                                                            <option value="<?php echo $rol_dato['id_rol'] ?>"><?php echo $rol_dato['rol'] ?></option>

                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label for="contrasena" class="label">Contraseña</label>
                                            <input type="password" class="input" name="password_user" placeholder="********" required />
                                        </div>

                                        <div class="field">
                                            <label for="contrasena_confirmar" class="label">Repita la contraseña</label>
                                            <input type="password" name="password_repeat" class="input" placeholder="********" required />
                                        </div>
                                        <hr>

                                        <div class="field is-grouped">
                                            <div class="control">
                                                <a href="index.php" class="button is-secondary">Cancelar</a>
                                            </div>
                                            <div class="control">
                                                <button class="button is-primary">Guardar</button>
                                            </div>
                                        </div>

                                    </form>

                                </div><!-- /.column -->
                            </div><!-- /.columns -->
                        </div><!-- /.card-content -->

                    </div><!-- /.card -->

                </div><!-- /.column -->




                <div class="column is-3">
                    <div class="column">
                        <img src="../public/images/icono1.gif" alt="" style="opacity: 60%; border-radius: 2%;">
                    </div>
                </div>
                <div class="column is-5">
                    <div class="column">
                        <div id="resumen-de-proyecto">
                            <h2>Sobre el Proyecto </h2>
                            <p>Implementamos un sistema automatizado de recopilación y distribución de datos energéticos y hídricos utilizando tecnologías IoT. Nuestro objetivo es mejorar la eficiencia operativa y la gestión de recursos mediante la precisión en la obtención de datos y la optimización de procesos.</p>
                            <h3>Equipo:</h3>
                            <p>Integrantes: Giovanni Pérez Espinoza, Gabriel Bardales Rojas, Nathalia Vela Monteodoro, Jonathan Junco Berrospi.</p>
                            <p>Docente: Einstein Arnold Ortiz Morales.

                        </div>
                    </div>
                </div>
            </div><!-- /.columns -->

        </div><!-- /.container -->
    </div><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include('../layout/pie.php');
?>