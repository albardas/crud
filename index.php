<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="Public/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="Public/css/all.min.css">
    <!-- <link rel="stylesheet" href="Public/css/estilos.css"> -->
    <link rel="stylesheet" type="text/css" href="Public/datatables/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="Public/datatables/buttons.bootstrap.css"/>
    <title>Document</title>
</head>
<body>
    <header>
     <div class="">
        <h1 class="text-center">CRUD DE PRACTICA</h1>
     </div>
    </header>
    <div class="container">
        <div class="col-md-6">
            <h2 class="text-center">Crear Categorias</h2>
            <form method="POST" id="frm_ins_cat" onsubmit="insertar(this,event)">
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <input  required="" class="form-control" type="text" name="categoria" id="categoria" placeholder="Nombre">
                </div>
                <button type="submit"  class="btn btn-primary btn-sm">Crear</button>
            </form> <br>
            <ul class="list-group categorias">
            </ul>
        </div>
        <div class="col-md-6">
         <h2 class="text-center">Crear Productos</h2>
         <form action="" method="POST" id="frm-ins-pro" onsubmit="InsertarProducto(this,event)">
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="id_categoria" id="id_categoria" class="form-control selectpicker" data-live-search="true" title="elige categoria">
                
                </select>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" name="precio" id="precio" class="form-control" required placeholder="Precio">
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="text" name="cantidad" id="cantidad" class="form-control" required placeholder="Cantidad">
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="text" name="stock" id="stock" class="form-control" required placeholder="Stock">
            </div>
            <button class="btn btn-success" type="submit">Guardar</button>
            
         </form>
         <ul class="list-group" id="productos"></ul>
        </div>

    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id ="modal_edit">
        <div class="modal-dialog" role="document">
            <form id="frm_update_cat"onsubmit="actualizar(this,event)">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id_categoria">
                        <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <input type="text" name="categoria" id="categoria" class="form-control" placeholder="nombre" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




    <div class="modal fade" tabindex="-1" role="dialog" id ="modal_edit_product">
        <div class="modal-dialog" role="document">
            <form id="frm_update_pro" onsubmit="actualizarProducto(this,event)">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id_producto">
                        <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <select name="categoria" id="id_categoria" class="form-control selectpicker" data-live-search="true" title="elige categoria">
                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" name="precio" id="precio" class="form-control" placeholder="precio" required>
                        </div>
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="cantidad" required>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" name="stock" id="stock" class="form-control" placeholder="stock" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    
    <script src="Public/js/jquery.js"></script>
    <script src="Public/js/bootstrap.min.js"></script>
    <script src="Public/js/bootstrap-select.min.js"></script>
    <script src="Public/js/categoria.js"></script>
    <script src="Public/js/producto.js"></script>
    <!-- datatables -->
    <script type="text/javascript" src="Public/datatables/jszip.js"></script>
    <script type="text/javascript" src="Public/datatables/pdfmake.js"></script>
    <script type="text/javascript" src="Public/datatables/vfs_fonts.js"></script>
    <script type="text/javascript" src="Public/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="Public/datatables/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="Public/datatables/dataTables.buttons.js"></script>
    <script type="text/javascript" src="Public/datatables/buttons.bootstrap.js"></script>
    <script type="text/javascript" src="Public/datatables/buttons.html5.js"></script>

</body>
</html>