<?php
    include 'conexionK.php';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $nombreO = $_GET['nombreO'];

        $consulta = "SELECT kerkly.Curp, kerkly.Nombre, kerkly.Apellido_Paterno, kerkly.Apellido_Materno from oficios INNER JOIN 
        oficio_kerkly on oficios.idOficio = oficio_kerkly.id_oficioK INNER JOIN kerkly on kerkly.Curp = oficio_kerkly.id_kerklyK WHERE 
        oficios.nombreO = '$nombreO';";
        
        $check = mysqli_query($Conexion,$consulta);

        $array = array();
        if(isset($check)){
            while($fila = mysqli_fetch_array($check, MYSQLI_ASSOC)){
                $array[] = $fila;
            }
            echo json_encode($array, JSON_UNESCAPED_UNICODE);
            $Conexion->close();
        }else{
            echo 'Error';
        }
    }


?>