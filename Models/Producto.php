<?php
// namespace Models\Producto;
require_once '../config/conexion.php';

class Producto 
{
    function __construct()
    {
        
    }
    
    public function listar()
    {
        $sql = "SELECT * FROM productos";
        return ejecutarConsulta($sql);
    }

    public function store($id_cat, $nombre, $precio,$cantidad, $stock)
    {
        $sql = "INSERT INTO productos (id_categoria, nombre, precio, cantidad, stock) VALUES ('$id_cat','$nombre','$precio','$cantidad','$stock')";
        return ejecutarConsulta($sql);
    }

    public function update($id,$id_categoria, $nombre, $precio,$cantidad, $stock)
    {
        $sql = "UPDATE productos SET id_categoria=$id_categoria, nombre = '$nombre', precio= '$precio', cantidad = '$cantidad', stock= '$stock' WHERE id = '$id' ";
        return ejecutarConsulta($sql);
    }

    public function destroy($id)
    {   
        $sql = "DELETE FROM productos WHERE id = '$id'";
        return ejecutarConsulta($sql);
    }
}




?>