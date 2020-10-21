$(document).ready(function () {
    listarEnfermedades();
    listarSistemasDelCuerpo();
    //listarSintomas();
    //addOpcionesSistemas();
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
                $("#relacionSistemas").append("<option value='"+element.idSistema+"'>"+element.nombreSistema+"</option>");
            });
        }
    });
}
function listarEnfermedades(){
    $("#tableEnfermedades").DataTable({
        "ajax":{
            "method":"POST",
            "data" : {'clase': 'Enfermedad' , 'metodo':'listarEnfermedades'},
            "url":"../controlador/interprete.php"
        },
        "columns":[
            {"data":"ID_SISTEMAS"},
            {"data":"NOMBRE_ENFERMEDAD"},
            {"data":"DESCRIPCION_ENFERMEDAD"},
            {"data":"LINK_IMAGEN"},
            {"data":null}
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