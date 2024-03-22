<?php
include("../app/config.php");
include('../layout/sesion.php');
include('../layout/encabezado.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Roles</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8">

                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Roles  Registrados</font>
                                </font>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center> Nro</center>
                                                </th>
                                                <th>
                                                    <center>Nombre del rol</center>
                                                </th>
                                               

                                                <th>
                                                    <center>Acciones</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include('../app/controllers/roles/listado_de_roles.php');
                                            $numero = 1;
                                            foreach ($roles_datos as $rol_dato) {
                                                $id_rol = $rol_dato['id_rol'];
                                            ?>
                                                <tr>
                                                    <td>
                                                        <center>
                                                            <?php echo $numero++; ?>
                                                            <center>
                                                    </td>
                                                    <td>
                                                        <?php echo $rol_dato['rol']; ?>
                                                    </td>
                                                    
                                                    <td>
                                                        <center>
                                                            <div class="btn-group">
                                                                <a href="update.php?id=<?php echo $id_rol; ?>" class="btn btn-success"><i class="fa fa-pen"></i>Editar</a>
                                                            </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>
                                                    <center> Nro</center>
                                                </th>
                                                <th>
                                                    <center>Nombre del rol</center>
                                                </th>
                                               
                                                <th>
                                                    <center>Acciones</center>
                                                </th>

                                            </tr>
                                        </tfoot>
                                    </table>
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->

<?php
include('../layout/pie.php');
include('../layout/mensajes.php');
?>



