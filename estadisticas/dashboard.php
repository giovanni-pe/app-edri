<?php
include_once "../layout/encabezado.php";
include("../app/config.php");
include('../layout/sesion.php');
include_once "../app/controllers/estadisticas/info.php";
include_once "../app/controllers/estadisticas/resumen_mensual.php";

?>

<?php

$hoy = fechaHoy();
list($inicio, $fin) = fechaInicioYFinDeMes();
if (isset($_GET["inicio"])) {
    $inicio = $_GET["inicio"];
}
if (isset($_GET["fin"])) {
    $fin = $_GET["fin"];
}
if (isset($_GET["hoy"])) {
    $hoy = $_GET["hoy"];
}
// $visitasYVisitantes = obtenerConteoVisitasYVisitantesEnRango($hoy, $hoy);
// $paginas = obtenerPaginasVisitadasEnFecha($hoy);
// $visitantes = obtenerVisitantesEnRango($inicio, $fin);
// $visitas = obtenerVisitasEnRango($inicio, $fin);
?>
<section class="section">
    <div class="columns">

        <div class="column">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Estadísticas entre <?php echo $inicio ?> y <?php echo $fin ?>
                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        <h1>Consumo en el Tiempo</h1>



                        <form id="dateFilterForm">
                            <input type="hidden" name="hoy" value="<?php echo $hoy ?>">
                            <div class="field is-grouped">
                                <p class="control is-expanded">
                                    <label>Desde: </label>
                                    <input class="input" type="datetime-local" id="startDate" name="start_date" value="<?php echo $inicio ?>">
                                </p>
                                <p class="control is-expanded">
                                    <label>Hasta: </label>
                                    <input class="input" type="datetime-local" id="endDate" name="end_date" value="<?php echo $fin ?>">
                                </p>
                                <p class="control">

                                    <label style="color: white;">ª</label>
                                    <button type="submit" class="button is-success input">OK
                                </p>
                            </div>
                        </form>
                        <canvas id="consumoChart" width="800" height="400"></canvas>
                    </div>
                </div>
                <footer class="card-footer">
                    <small class="mx-2 my-2">
                        stadistics
                    </small>
                </footer>
            </div>
        </div>
        <div class="column is-one-third ">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Resumen Mensual
                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        <form class="mb-2">
                            <input type="hidden" name="inicio" value="<?php echo $inicio ?>">
                            <input type="hidden" name="fin" value="<?php echo $fin ?>">
                            <div class="field is-grouped">
                                <p class="control is-expanded">
                                    <label>Hasta </label>
                                    <input class="input" disabled type="date" name="hoy" value="<?php echo $hoy ?>">
                                </p>
                                
                            </div>
                        </form>
                        <div class="field is-grouped is-grouped-multiline">
                            <div class="control">
                                <div class="tags has-addons">
                                    <span class="tag is-success is-large">Consumo</span>
                                    <span class="tag is-info is-large"><?php echo $consumo_mes_actual?> KW</span>
                                </div>
                                <div class="tags has-addons">
                                    <span class="tag is-success is-large">Monto a pagar(S/.)</span>
                                    <span class="tag is-info is-large"><?php echo $monto_en_soles ?></span>
                                </div>
                            </div>
                            <div class="control">
                                <div class="tags has-addons">
                                    <span class="tag is-warning is-large">Dipositivos</span>
                                    <span class="tag is-info is-large">1</span>
                                </div>
                            </div>
                        </div>
                        <!-- <table class="table">
                            <thead>
                                <tr>
                                    <th>Dispositivo</th>
                                    <th>Lectura</th>
                                    <th>Tipo</th>
                                    <th>Estadísticas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($paginas as $pagina) { ?>
                                    <tr>
                                        <td><a target="_blank" href="<?php echo $pagina->url ?>"><?php echo $pagina->pagina ?></a></td>
                                        <td><?php echo $pagina->conteo_visitas ?></td>
                                        <td><?php echo $pagina->conteo_visitantes ?></td>
                                        <td>
                                            <a class="button is-info" href="visitas_url.php?url=<?php echo urlencode($pagina->url) ?>">
                                                <i class="fa fa-chart-area"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table> -->
                    </div>
                </div>
                <footer class="card-footer">
                    <small class="mx-2 my-2"></small>
                </footer>
            </div>
        </div>
    </div>
</section>
<script>
    var ctx = document.getElementById('consumoChart').getContext('2d');
    var apiUrl = '<?php echo  $API_CONSUMO;?>/getReadsBetweenDate/<?php echo $dispositivo_codigo;?>'; // Reemplaza la URL con la URL real de tu API
    
    // Función para obtener los datos de la API con filtros de fecha
    async function fetchData(startDate, endDate) {
        try {
            const response = await fetch(`${apiUrl}?start_date=${startDate}&end_date=${endDate}`);
            const data = await response.json();
            return data;
        } catch (error) {
            console.error('Error al obtener los datos:', error);
        }
    }

    // Función para actualizar la gráfica con los datos de la API y los filtros de fecha
    async function updateChart(startDate, endDate) {
        const data = await fetchData(startDate, endDate);
        const labels = data.map(entry => entry.fecha_hora); // Usar la fecha y hora como etiquetas
        const consumoData = data.map(entry => entry.lectura_energia); // Usar lectura de energía como datos

        // Verificar si existe una instancia válida de Chart.js almacenada en window.consumoChart
        if (window.consumoChart instanceof Chart && typeof window.consumoChart.destroy === 'function') {
            // Destruir la instancia anterior de la gráfica
            window.consumoChart.destroy();
        }

        var consumoChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Consumo',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    data: consumoData
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false,
                        }
                    }]
                }
            }
        });


        // Guardar la instancia de la gráfica para poder destruirla más tarde si es necesario
        window.consumoChart = consumoChart;
    }



    // Función para manejar el envío del formulario
    document.getElementById('dateFilterForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar el comportamiento predeterminado del formulario
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        updateChart(startDate, endDate); // Actualizar la gráfica con las fechas seleccionadas
    });

    // Llamar a la función para inicializar la gráfica sin filtros cuando la página se cargue
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    updateChart(startDate, endDate); // Actualizar la gráfica
</script>
<?php include_once "../layout/pie.php" ?>