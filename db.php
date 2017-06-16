<?php

function insert($Rut,$Nombre,$Paterno,$Materno,$CodCargo){

    $Fecha = date("m/d/Y");

    switch ($CodCargo) {
    case 1:  $Cargo = "Supervisor Eléctrico";                 break;
    case 2:  $Cargo = "Eléctrico Primera";                    break;
    case 3:  $Cargo = "Eléctrico Segunda";                    break;
    case 4:  $Cargo = "Supervisor Obras Civiles";             break;
    case 5:  $Cargo = "Operador Camión Pluma";                break;
    case 6:  $Cargo = "Supervisor Montaje Piping";            break;
    case 7:  $Cargo = "Supervisor Eléctrico Instrumentista";  break;
    case 8:  $Cargo = "Asistente Técnico Planificador";       break;
    case 9:  $Cargo = "Supervisor Mecánico";                  break;
    case 10: $Cargo = "Mecánico Primera";                     break;
    case 11: $Cargo = "Mecánico Segunda";                     break;
    case 12: $Cargo = "Administrador de Contrato";            break;
    case 13: $Cargo = "Administrador de Proyecto";            break;
    case 14: $Cargo = "Jefe de Proyecto";                     break;
    default: $Cargo = "No Definido";                          break;   
    }


    if (!$enlace = mysql_connect('localhost', 'eminorcl_adm', '14.,eminor.,14')){
        echo 'No pudo conectarse';
        exit;
    }

    if (!mysql_select_db('postulaciones', $enlace)){
        echo 'No pudo seleccionar la base de datos';
        exit;
    }

    $sql = 'INSERT INTO postulaciones VALUES("'.$Rut.'","'.$Nombre.'","'.$Paterno." ".$Materno.'","'.$CodCargo.'","'.$Cargo.'","'.$Fecha.'")';
    $resultado = mysql_query($sql, $enlace);

    if (!$resultado) {
        echo "Error de BD, no se pudo consultar la base de datos\n";
        echo "Error MySQL: ' . mysql_error()'";
        exit;
    }

}

?>
