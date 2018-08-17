<?php
require_once '../Models/Producto.php';
// namespace Controllers\ProductoControllers;

$producto = new Producto();
switch ($_GET['op']) {
    case 'listar':
        $rspta = $producto->listar();
        if ($rspta) {
            $datos=[];
            $i = 0;
            while ($f = $rspta->fetch(PDO::FETCH_OBJ)) {
                $datos[$i]['id'] = $f->id;
                $datos[$i]['id_categoria'] = $f->id_categoria;
                $datos[$i]['nombre'] = $f->nombre;
                $datos[$i]['precio'] = $f->precio;
                $datos[$i]['cantidad'] = $f->cantidad;
                $datos[$i]['stock'] = $f->stock;
                $i++;
            }
            $response=['success'=>true, 'datos'=>$datos];
        }else{
            $response=['success'=>false, 'msg'=>'fallo la consulta'];
        }
        echo json_encode($response);
    break;

    case 'store':
        $id_categoria = limpiarCadena($_POST['id_categoria']);
        $nombre = limpiarCadena($_POST['nombre']);
        $precio = limpiarCadena($_POST['precio']);
        $cantidad = limpiarCadena($_POST['cantidad']);
        $stock = limpiarCadena($_POST['stock']);
		$rspta = $producto->store($id_categoria, $nombre, $precio, $cantidad, $stock);
		if ($rspta) {
			$response=['success'=>true, 'msg'=>'se ejecuto con exito'];
		}else{
			$response=['success'=>false, 'msg'=>'fallo la consulta'];
		}
		echo json_encode($response);
    break;

    case 'update':
        $id = $_POST['id'];
        $id_categoria = limpiarCadena($_POST['categoria']);
        $nombre = limpiarCadena($_POST['nombre']);
        $precio = limpiarCadena($_POST['precio']);
        $cantidad = limpiarCadena($_POST['cantidad']);
        $stock = limpiarCadena($_POST['stock']);
        $rspta = $producto->update($id,$id_categoria,$nombre, $precio, $cantidad,$stock);
        if ($rspta) {
            $response=['success'=>true, 'msg'=>'se actualizo el producto'];
        }else{
            $response=['success'=>false, 'msg'=>'no se pudo actualizar el producto'];
        }
        echo json_encode($response);
    break;

    case 'delete':
        $id= $_POST['id'];
        // $nombre = $_POST['nombre'];
        $rspta = $producto->destroy($id);
        if ($rspta) {
            $response=['success'=>true, 'msg'=>'se elimino el producto'];
        }else{
            $response=['success'=>false, 'msg'=> 'no se pudo elimina el producto'];
        }
        echo json_encode($response);
    break;
}


?>