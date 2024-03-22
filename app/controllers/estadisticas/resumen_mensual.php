<?php
$base_api_url =$API_CONSUMO.'/getReadsBetweenDate/'.$dispositivo_codigo;
$lecturas = json_decode(file_get_contents($base_api_url), true);

// Función para calcular el consumo del mes actual
function calcularConsumoMesActual($lecturas) {
    // Obtener el primer día del mes actual
    $primer_dia_mes = date('Y-m-01');
    // Obtener la fecha actual
    $fecha_actual = date('Y-m-d');

    // Filtrar las lecturas dentro del mes actual
    $lecturas_mes_actual = $lecturas;
    // array_filter($lecturas, function($lectura) use ($primer_dia_mes, $fecha_actual) {
    //     return ($lectura['fecha_hora'] >= $primer_dia_mes && $lectura['fecha_hora'] <= $fecha_actual);
    // });

    // Ordenar las lecturas por fecha
    usort($lecturas_mes_actual, function($a, $b) {
        return strtotime($a['fecha_hora']) - strtotime($b['fecha_hora']);
    });

    // Calcular el consumo sumando las lecturas de agua
    $consumo_total = 0;
    $primera_lectura = null;
    $ultima_lectura = null;
    
    foreach ($lecturas_mes_actual as $lectura) {
   
        if ($lectura['lectura_energia'] !== null) {
            if ($primera_lectura === null) {
                $primera_lectura = $lectura['lectura_energia'];
            }
            $ultima_lectura = $lectura['lectura_energia'];
        }
    }

    // Calcular el consumo como la diferencia entre la última y la primera lectura
    if ($primera_lectura !== null && $ultima_lectura !== null) {
        $consumo_total = $ultima_lectura - $primera_lectura;
    }

    return $consumo_total;
}
$consumo_mes_actual = calcularConsumoMesActual($lecturas);
$monto_en_soles = $consumo_mes_actual*0.44;