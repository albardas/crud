


function listarProductos(){
    $.ajax({
         url: 'Controllers/ProductoControllers.php?op=listar',
         type: 'POST',
         dataType: 'json',
         encode: true,
        //  data: datos,
        //  contentType: false,
        //  processData: false,
         success: function(data){
              if (data.success) {
                   llenarUlProductos(data.datos)
              }else {
                   alert(data.msg);
              }
         }
    })
}
listarProductos();

function llenarUlProductos(productos){
    // console.table(categorias);
    let ul = document.getElementById('productos');
    console.log('ul '+ul);
    lis = '';
    // opts = '';
    productos.forEach((producto)=> {
        lis+= `<li class="list-group-item">${producto.nombre}
            <span class="badge">${producto.stock}</span> 
            <i class="pull-right btn btn-warning btn-xs fas fa-edit"
            onclick="abrirModalProducto(${producto.id}, ${producto.id_categoria}, '${producto.nombre}', ${producto.precio},
             ${producto.cantidad}, ${producto.stock})"></i>

            <i class="pull-right btn btn-danger btn-xs fas fa-times"
            onclick="eliminarProducto(${producto.id})"></i>

        </li>`;

        // opts+=`<option value="${categoria.id_categoria}">${categoria.nombre}</option>`;
    });
    ul.innerHTML=lis;

    // $("#id_categoria").html(opts);
    // $("#id_categoria").selectpicker('refresh');
}

function InsertarProducto(form,e){
    e.preventDefault();
    let datosFormulario = new FormData($(form)[0]);

    $.ajax({
         url: 'Controllers/ProductoControllers.php?op=store',
         type: 'POST',
         dataType: 'json',
         encode: true,
         data: datosFormulario,
         contentType: false,
         processData: false,
         success: function(data){
             console.log('La data desde el controlador: '+data);
              if (data.success) {
                   alert(data.msg);
                   $(form)[0].reset();
                   listarProductos();
              }else {
                   alert(data.msg);
              }
         }
    })
}

function eliminarProducto(id){
    let question = confirm("Estas seguro de eliminar este producto");

    if (question = true) {
        $.post('Controllers/ProductoControllers.php?op=delete', {id: id}, function(data){
            data = JSON.parse(data);
            if (data.success) {
                listarProductos();
            }else{
                alert(data.msg);
            }
        });
    }
}

function abrirModalProducto(id, id_categoria, nombre, precio, cantidad, stock){
    $("#frm_update_pro h4.modal.title").text(`Editar ${nombre}`);
    $("#frm_update_pro input#id_producto").val(id);
    $("#frm_update_pro #id_categoria").val(id_categoria);
    $("#frm_update_pro #id_categoria").selectpicker('refresh');
    $("#frm_update_pro input#nombre").val(nombre);
    $("#frm_update_pro input#precio").val(precio);
    $("#frm_update_pro input#cantidad").val(cantidad);
    $("#frm_update_pro input#stock").val(stock);
    $("#modal_edit_product").modal("show");
}

function actualizarProducto(form, e){
    e.preventDefault();
    let datosFormulario = new FormData($(form)[0]);

    $.ajax({
         url: 'Controllers/ProductoControllers.php?op=update',
         type: 'POST',
         dataType: 'json',
         encode: true,
         data: datosFormulario,
         contentType: false,
         processData: false,
         success: function(data){
              if (data.success) {
                   alert(data.msg);
                   listarProductos();
              }else {
                   alert(data.msg);
              }
         }
    })
}