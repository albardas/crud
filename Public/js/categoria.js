function listarCategorias(){
    $.ajax({
         url: 'Controllers/CategoriaControllers.php?op=listar',
         type: 'POST',
         dataType: 'json',
         encode: true,
        //  data: datos,
        //  contentType: false,
        //  processData: false,
         success: function(data){
              if (data.success) {
                   llenarUl(data.categorias);
              }else {
                   alert(data.msg);
              }
         }
    })
}
listarCategorias();

function llenarUl(categorias){
    console.table(categorias);
    let ul = document.querySelector('ul');
    console.log('ul '+ul);
    lis = '';
    opts = '';
    categorias.forEach((categoria)=> {
        lis+= `<li class="list-group-item">${categoria.nombre}
            <i class="pull-right btn btn-warning btn-xs fas fa-edit"
            onclick="abrirModal(${categoria.id_categoria}, '${categoria.nombre}')"></i>

            <i class="pull-right btn btn-danger btn-xs fas fa-times"
            onclick="eliminarCategoria(${categoria.id_categoria},'${categoria.nombre}')"></i>

        </li>`;

        opts+=`<option value="${categoria.id_categoria}">${categoria.nombre}</option>`;
    });
    ul.innerHTML=lis;

    $("#frm-ins-pro #id_categoria").html(opts);
    $("#frm-ins-pro #id_categoria").selectpicker('refresh');
    $("#frm_update_pro #id_categoria").html(opts);
    $("#frm_update_pro #id_categoria").selectpicker('refresh');
}

function insertar(form,e){
    e.preventDefault();
    let datosFormulario = new FormData($(form)[0]);

    $.ajax({
         url: 'Controllers/CategoriaControllers.php?op=store',
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
                   listarCategorias();
              }else {
                   alert(data.msg);
              }
         }
    })
}

function eliminarCategoria(id_categoria, nombre){
    let question = confirm("Estas seguro de eliminar esta categoria");

    if (question = true) {
        $.post('Controllers/CategoriaControllers.php?op=delete', {id: id_categoria, nombre:nombre}, function(data){
            data = JSON.parse(data);
            if (data.success) {
                listarCategorias();
            }else{
                alert(data.msg);
            }
        });
    }
}

function abrirModal(id, nombre){
    $("#frm_update_cat h4.modal.title").text(`Editar ${nombre}`);
    $("#frm_update_cat input#id_categoria").val(id);
    $("#frm_update_cat input#categoria").val(nombre);
    $("#modal_edit").modal("show");
}

function actualizar(form, e){
    e.preventDefault();
    let datosFormulario = new FormData($(form)[0]);

    $.ajax({
         url: 'Controllers/CategoriaControllers.php?op=update',
         type: 'POST',
         dataType: 'json',
         encode: true,
         data: datosFormulario,
         contentType: false,
         processData: false,
         success: function(data){
              if (data.success) {
                   alert(data.msg);
                   listarCategorias();
              }else {
                   alert(data.msg);
              }
         }
    })
}