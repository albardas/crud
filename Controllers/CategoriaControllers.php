<?php
// namespace Controllers;
// use MODELS\Categoria as Categoria;
require_once '../Models/Categoria.php';

$category = new Categoria();
switch ($_GET['op']) {
    case 'listar':
        $rspta = $category->listar();
        if ($rspta) {
            $datos=[];
            $i = 0;
            while ($f = $rspta->fetch(PDO::FETCH_OBJ)) {
                $datos[$i]['id_categoria'] = $f->id;
                $datos[$i]['nombre'] = $f->nombre;
                $i++;
            }
            $response=['success'=>true, 'categorias'=>$datos];
        }else{
            $response=['success'=>false, 'msg'=>'fallo la consulta'];
        }
        echo json_encode($response);
    break;

    case 'store':
		$categoria = limpiarCadena($_POST['categoria']);
		$rspta = $category->store($categoria);
		if ($rspta) {
			$response=['success'=>true, 'msg'=>'se ejecuto con exito'];
		}else{
			$response=['success'=>false, 'msg'=>'fallo la consulta'];
		}
		echo json_encode($response);
    break;

    case 'update':
        $id = $_POST['id'];
        $nombre = limpiarCadena($_POST['categoria']);
        $rspta = $category->update($id,$nombre);
        if ($rspta) {
            $response=['success'=>true, 'msg'=>'se actualizo la categoria'];
        }else{
            $response=['success'=>false, 'msg'=>'no se pudo actualizar la categoria'];
        }
        echo json_encode($response);
    break;

    case 'delete':
        $id= $_POST['id'];
        $nombre = $_POST['nombre'];
        $rspta = $category->destroy($id);
        if ($rspta) {
            $response=['success'=>true, 'msg'=>'se elimino la categoria' . $nombre];
        }else{
            $response=['success'=>false, 'msg'=> 'no se pudo elimina la categoria' . $nombre];
        }
        echo json_encode($response);
    break;
}


?>