
/**********************************************************************************
                            Data Table
**********************************************************************************/

$(document).ready(function() {
    $('#table_registros').DataTable( {
        dom: 'Blfrtip',
        buttons: [
            {
                extend:'print',
                footer: true,
                text: 'Imprimir',
                message: 'REPORTE DE REGISTROS',
                title: '',
                orientation: 'landscape',
                pageSize: 'LETTER'
            },
            {
                extend:'pdf',
                footer: true,
                message: 'REPORTE DE REGISTROS',
                orientation: 'landscape',
                pageSize: 'LETTER'
            },
            {
                extend:'excel',
                footer: true,
            }
        ],

        "scrollY":        "394px",
        "scrollCollapse": false,
        "paging":         false,   
    });
} );




/**********************************************************************************
                            Editar Vales
**********************************************************************************/

$(function(){
    $('body').on('click','#editar', function(e){
        e.preventDefault();

        folio_vale = $(this).parents("tr").find("td").eq(0).html();      

        $(location).attr('href', 'editar_registro?folio='+folio_vale);         
    });
});


/*$(function(){
    $('body').on('click','#updateVale a', function(e){
        e.preventDefault();

        folio        = $('#folio').val();
        folio_asoc   = $('#folio_asoc').val();
        fecha        = $('#fecha_vale').val();
        solicita     = $('#nombre').val();
        chofer       = $('#chofer').val();
        unidad       = $('#unidad').val();
        no_econ      = $('#no_econ').val();
        placas       = $('#placas').val();
        litros       = $('#litros').val();
        costo_litro  = $('#costo_litro').val();
        departamento = $('#departamento').val();
        km           = $('#km').val();
        gasolinera   = $('#gasolinera').val();
        descripcion  = $('#descripcion').val();


        if(folio!="" && fecha!="" && solicita!="" && chofer!="" && unidad!="" && no_econ!="" && placas!="" && litros!="" && departamento!="" && km!="" && gasolinera!="" && descripcion!="")
        {
            $.ajax({
                url:  $('#updateVale').attr('action'),
                type: $('#updateVale').attr('method'),
                data: {folio:folio, folio_asoc:folio_asoc, fecha:fecha, solicita:solicita, chofer:chofer, unidad:unidad, no_econ:no_econ, placas:placas, litros:litros, costo_litro:costo_litro, departamento:departamento, km:km, gasolinera:gasolinera, descripcion:descripcion},
                success: function(updateVale)
                {
                    if(updateVale =='true')
                    {
                        alert("Los datos han sido actualizados correctamente");
                        $(location).attr('href','vales');
                    }
                    else
                    {
                        alert("Algo ha salido mal, por favor intente de nuevo.");
                        $(location).attr('href','vales');
                    }
                }
            });
        }
        else
        {
            alert("Por favor llene todos los campos")
        }   
    });
});


/**********************************************************************************
                           Eliminar Usuarios
**********************************************************************************/

$(function(){
    $("body").on('click','#eliminar', function(e){
        e.preventDefault();

        id = $(this).parents("tr").find("td").eq(0).html();
        //usuario = $(this).parents("tr").find("td").eq(2).html();

        respuesta = confirm("Desea eliminar el registro: " + id);

        if (respuesta) {
            ur = $("#delete").val();
            $.ajax({
                url: ur,
                type: 'POST',
                data: {id:id},               
                success:function(eliminarUsuario){
                    if(eliminarUsuario == 'true')
                    {
                        alert("El registro se ha borrado correctamente");

                        $(location).attr('href', 'registros');
                    }
                    else
                    {
                        alert("Error al intentar borrar el registro, intente de nuevo");
                        $(location).attr('href', 'registros');
                    }
                }
            });
        }
        else
        {
            $(location).attr('href', 'registros');
        }         
    });
});