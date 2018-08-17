<?php
require_once '../config/conexion.php';

class Categoria 
{
    function __construct()
    {
        
    }
    
    public function listar()
    {
        $sql = "SELECT * FROM categorias";
        return ejecutarConsulta($sql);
    }

    public function store($categoria)
    {
        $sql = "INSERT INTO categorias (`nombre`,`state`) VALUES ('$categoria', 1)";
        return ejecutarConsulta($sql);
    }

    public function update($id,$nombre)
    {
        $sql = "UPDATE categorias SET nombre = '$nombre' WHERE id = '$id' ";
        return ejecutarConsulta($sql);
    }

    public function destroy($id)
    {   
        $sql = "DELETE FROM categorias WHERE id = '$id'";
        return ejecutarConsulta($sql);
    }
}




?>