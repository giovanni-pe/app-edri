
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>

    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.1/css/bulma.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<style>
    .navbar-item {
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2); /* Sombra sutíl */
    font-weight: bold; /* Hace que el texto sea más audaz */
    font-family: 'Arial', sans-serif; /* Cambiar la fuente a algo más elegante */
}

.navbar-item:hover {
    color: #ffd700; /* Cambiar color al dorado al pasar el mouse */
}

.navbar-item i {
    margin-left: 5px; /* Espacio entre el texto y el icono */
}

.navbar-item i.fa {
    color: #32cd32; /* Color verde lima para los iconos */
}

.navbar-item i.fa:hover {
    color: #228b22; /* Cambiar color al verde oscuro al pasar el mouse */
}


</style>
</head>

<body>
    <nav class="navbar is-success" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <button class="navbar-burger is-info button" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </button>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="../estadisticas/dashboard.php">
                 Pane
                    <i class=" fa fa-chart-area"></i>
                </a>
            </div>
            <div class="navbar-center">
                <a class="navbar-item" href="../cuenta">cuenta
                    <i class="fa fa-users"></i>
                </a>
            </div>
            <div class="navbar-end">
         
                <a class="navbar-item " style="background-color: red;" href="../app/controllers/login/cerrar_sesion.php">Cerrar Sesion
                
            </a>
            </div>
        </div>
    </nav>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", () => {
            const boton = document.querySelector(".navbar-burger");
            const menu = document.querySelector(".navbar-menu");
            boton.onclick = () => {
                menu.classList.toggle("is-active");
                boton.classList.toggle("is-active");
            };
        });
    </script>