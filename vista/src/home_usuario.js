var tablaEnfermedades;
$(document).ready(function () {
    //listarEnfermedades();
    listarSistemasDelCuerpo();
    //listarSintomas();
    //addOpcionesSistemas();
    listarEnfermedades();
    $('#tableEnfermedades tbody').on( 'click', 'button.editar', function () {
        var dataEditar = tablaEnfermedades.row( $(this).parents('tr') ).data();
        console.log(dataEditar.NOMBRE_ENFERMEDAD);
        $("#idEditEnfermedad").val(dataEditar.ID_ENFERMEDADES);
        $("#nomEditEnfermedad").val(dataEditar.NOMBRE_ENFERMEDAD);
        $("#descEditEnfermedad").val(dataEditar.DESCRIP_ENFERMEDAD);
        $("#relacionEditSistemas").val(dataEditar.ID_SISTEMAS);
        $("#urlAntiguaEnfermedad").val(dataEditar.LINK_IMAGEN);
        $("#LinkEditImage").attr('href', dataEditar.LINK_IMAGEN);
        $("#viewImageEdit").attr('src', dataEditar.LINK_IMAGEN);
        $("#vtnOpenEditEnfermedad").click();
    } );
    
    $('#tableEnfermedades tbody').on( 'click', 'button.eliminar', function () {
        var dataEliminar = tablaEnfermedades.row( $(this).parents('tr') ).data();
        console.log(dataEliminar);
        $("#urlEliminarEnfermedad").html(dataEliminar.NOMBRE_ENFERMEDAD);
        $("#viewImageEliminar").attr('src', dataEliminar.LINK_IMAGEN);
        $("#idEliminarEnfermedad").val(dataEliminar.ID_ENFERMEDADES);
        $("#vtnOpenEliminarEnfermedad").click();
    } );

    $("#formEliminarEnfermedad").submit(function (e) { 
        let datosEnfermedad = {
        clase: "Enfermedad",
        metodo: "EliminarEnfermedad",
        idEliminarEnfermedad: $("#idEliminarEnfermedad").val()
        };
        $.post("../controlador/interprete.php",datosEnfermedad,function(resp){
            console.log(resp);
            if(resp){
                $('#tableEnfermedades').dataTable().fnDestroy();
                $("#vtnClosedEliminarEnfermedad").click();
                // $("#formCrearFacultad")[0].reset();
                // $("#exito").removeClass("d-none");
                listarEnfermedades();
            }else{
                //$("#error").removeClass("d-none");
            }
        });
        e.preventDefault();
    });
});


function addOpcionesSistemas(){
    let entrada = { 
        clase: "Sistema",
        metodo: "listarNombreSistema"
    } 
    $.ajax({
        type: "POST",
        url: "../controlador/interprete.php",
        data: entrada,
        success: function (response) {
            console.log(response);
            let listaNombres = JSON.parse(response);
            listaNombres.forEach(element => {
                $(".selectEnfermedades").append("<option value='"+element.id+"'>"+element.nombreSistema+"</option>");
            });
        }
    });
}

function listarEnfermedades(){
    tablaEnfermedades = $("#tableEnfermedades").DataTable({
        "ajax":{
            "method":"POST",
            "data" : {'clase': 'Enfermedad' , 'metodo':'listarEnfermedades'},
            "url":"../controlador/interprete.php"
        },
        "columns":[
            {"data":"ID_SISTEMAS"},
            {"data":"NOMBRE_ENFERMEDAD"},
            {"data":"DESCRIP_ENFERMEDAD"},
            {"data":"LINK_IMAGEN"},
            {"data": null,
            "defaultContent": "<button type='button' class='editar btn btn-warning'> <i class='far fa-edit'></i></button> <button type='button' class='eliminar btn btn-danger'><i class='far fa-trash-alt'></i></button>"}
        ]
    });
    addOpcionesSistemas();
}


function listarSistemasDelCuerpo(){
    $("#tableSistemaHumano").DataTable({
        "ajax":{
            "method":"POST",
            "data" : {'clase': 'Sistema' , 'metodo':'listarSistemas'},
            "url":"../controlador/interprete.php"
        },
        "columns":[
            {"data":"ID_SISTEMAS"},
            {"data":"NOMBRE_SISTEMA"},
            {"data":"IMAGEN_SISTEMA"},
            {"data":"TIPO_SISTEMA"},
            {"data": null}
        ]
    });
}
function listarSintomas(){
    $("#tableSintomas").DataTable({
        "ajax":{
            "method":"POST",
            "data" : {'clase': 'Sintomas' , 'metodo':'listarSintomas'},
            "url":"../controlador/interprete.php"
        },
        "columns":[
            {"data":"ID_SINTOMA"},
            {"data":"NOMBRE_SINTOMA"},
            {"data":"IMG_SINTOMAS"},
            {"data": null}
        ]
    });
}