<?php 
    $dia = $_POST['fDia'];
    $mes = $_POST['fMes'];
    $anio = $_POST['fAnio'];

    $fActual = strtotime( date('Y-m-d') );
    $fParam = strtotime($anio."/".$mes."/".$dia);

    $fRes= intval( ($fParam - $fActual)/86400 );

    header('Location: ../unidad2.php?dr='.$fRes);

?>