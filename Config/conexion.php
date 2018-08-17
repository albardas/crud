<?php
// namespace Models;

try {
    $con = new PDO('mysql:host=localhost; dbname=db_crud; charset=utf8', 'root', '');
} catch (PDOException $e) {
    print $e->getmessage();
    die();
    exit();
}

if (!function_exists('ejecutarConsulta')) {

    function ejecutarConsulta($sql)
    {
        global $con;
        $query = $con->prepare($sql);
        $query->execute();
        return $query;
    }

    function limpiarCadena($str)
    {
        $cadenaLimpia = htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
        return trim($cadenaLimpia);
    }
}


?>

