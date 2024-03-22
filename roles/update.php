<?php
include("../app/config.php");
include('../layout/sesion.php');
include('../layout/encabezado.php');
include('../app/controllers/roles/update_rol.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar Rol</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Llene los datos con cuidado</font>
                                </font>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <div class="row">

                                <div class="col-md-12">
                                <form action="../app/controllers/roles/update.php" method="post">
                                       <input type="text" hidden name="id_rol" value="<?php echo $id_rol_get;?>">
                                        <div class="form-grop">
                                            <label for="nombres">Rol</label>
                                            <input type="text" class="form-control" name="rol" value="<?php echo $rol;?>" required />
                                        </div>

                                        <div class="form-grop">
                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                            <button class="btn btn-success">Actualizar</button>
                                        </div>

                                    </form>

                                    
                                </div>
                            </div>
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