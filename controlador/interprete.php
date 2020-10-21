<?php
    require_once("../model/model_enfermedades.php");
    $clase = $_REQUEST['clase'];
    switch ($clase) {
        case 'Sintomas':
            $res = consultasSintomas();
            break;
        case 'Sistema':
            $res = consultasSistemaHumano();
            break;
        case 'Enfermedad':
            $res = consultasEnfermedad();
            break;
        
        default:
            # code...
            break;
    }


    function consultasSistemaHumano(){
        $metodo = $_REQUEST['metodo'];
        $respuesta = "";
        switch ($metodo) {
            case 'listarNombreSistema':
                $mysqli = new mysqli('bxqsxwdoasmaf0zorzvi-mysql.services.clever-cloud.com', 'uasrxz4qrh1xinnr', 'WSM9ks7dz2mQJcZ9DUCy', 'bxqsxwdoasmaf0zorzvi');
    
                // ¡Oh, no! Existe un error 'connect_errno', fallando así el intento de conexión
                if ($mysqli->connect_errno) {
                    // La conexión falló. ¿Que vamos a hacer? 
                    // Se podría contactar con uno mismo (¿email?), registrar el error, mostrar una bonita página, etc.
                    // No se debe revelar información delicada          
                    // Probemos esto:
                    echo "Lo sentimos, este sitio web está experimentando problemas.";  
                    // Algo que no se debería de hacer en un sitio público, aunque este ejemplo lo mostrará
                    // de todas formas, es imprimir información relacionada con errores de MySQL -- se podría registrar
                    echo "Error: Fallo al conectarse a MySQL debido a: \n";
                    echo "Errno: " . $mysqli->connect_errno . "\n";
                    echo "Error: " . $mysqli->connect_error . "\n";            
                    // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
                    exit;
                }
                $sql = "SELECT * FROM SISTEMA_CUERPO";
                if (!$resultado = $mysqli->query($sql)) {
                    // ¡Oh, no! La consulta falló. 
                    echo "Lo sentimos, este sitio web está experimentando problemas.";
                
                    // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
                    // cómo obtener información del error
                    echo "Error: La ejecución de la consulta falló debido a: \n";
                    echo "Query: " . $sql . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                }else{
                    while($data = mysqli_fetch_assoc($resultado)){
                        $idSistema = $data['ID_SISTEMAS'];
                        $nombreSistema = $data['NOMBRE_SISTEMA'];
                        $res[] = array("id"=>$idSistema,"nombreSistema" =>$nombreSistema);
                    }
                    $respuesta = json_encode($res);
                }
                mysqli_close($mysqli);
                break;

            case 'listarSistemas':
                $mysqli = new mysqli('bxqsxwdoasmaf0zorzvi-mysql.services.clever-cloud.com', 'uasrxz4qrh1xinnr', 'WSM9ks7dz2mQJcZ9DUCy', 'bxqsxwdoasmaf0zorzvi');
    
                // ¡Oh, no! Existe un error 'connect_errno', fallando así el intento de conexión
                if ($mysqli->connect_errno) {
                    // La conexión falló. ¿Que vamos a hacer? 
                    // Se podría contactar con uno mismo (¿email?), registrar el error, mostrar una bonita página, etc.
                    // No se debe revelar información delicada          
                    // Probemos esto:
                    echo "Lo sentimos, este sitio web está experimentando problemas.";  
                    // Algo que no se debería de hacer en un sitio público, aunque este ejemplo lo mostrará
                    // de todas formas, es imprimir información relacionada con errores de MySQL -- se podría registrar
                    echo "Error: Fallo al conectarse a MySQL debido a: \n";
                    echo "Errno: " . $mysqli->connect_errno . "\n";
                    echo "Error: " . $mysqli->connect_error . "\n";            
                    // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
                    exit;
                }
                $sql = "SELECT * FROM SISTEMA_CUERPO";
                if (!$resultado = $mysqli->query($sql)) {
                    // ¡Oh, no! La consulta falló. 
                    echo "Lo sentimos, este sitio web está experimentando problemas.";
                
                    // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
                    // cómo obtener información del error
                    echo "Error: La ejecución de la consulta falló debido a: \n";
                    echo "Query: " . $sql . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                }else{
                    while($data = mysqli_fetch_assoc($resultado)){
                        $arreglo["data"][] = $data;
                    }
                    $respuesta = json_encode($arreglo);
                }
                mysqli_close($mysqli);
                break;
            
            default:
                # code...
                break;
        }
        //var_dump($respuesta);
        echo $respuesta;
    }

function consultasEnfermedad(){
    $metodo = $_REQUEST['metodo'];
    $respuesta = "";
    switch ($metodo) {
        case 'listarEnfermedades':
            $mysqli = new mysqli('bxqsxwdoasmaf0zorzvi-mysql.services.clever-cloud.com', 'uasrxz4qrh1xinnr', 'WSM9ks7dz2mQJcZ9DUCy', 'bxqsxwdoasmaf0zorzvi');

            // ¡Oh, no! Existe un error 'connect_errno', fallando así el intento de conexión
            if ($mysqli->connect_errno) {
                // La conexión falló. ¿Que vamos a hacer? 
                // Se podría contactar con uno mismo (¿email?), registrar el error, mostrar una bonita página, etc.
                // No se debe revelar información delicada          
                // Probemos esto:
                echo "Lo sentimos, este sitio web está experimentando problemas.";  
                // Algo que no se debería de hacer en un sitio público, aunque este ejemplo lo mostrará
                // de todas formas, es imprimir información relacionada con errores de MySQL -- se podría registrar
                echo "Error: Fallo al conectarse a MySQL debido a: \n";
                echo "Errno: " . $mysqli->connect_errno . "\n";
                echo "Error: " . $mysqli->connect_error . "\n";            
                // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
                exit;
            }
            $sql = "SELECT * FROM ENFERMEDAD";
            if (!$resultado = $mysqli->query($sql)) {
                // ¡Oh, no! La consulta falló. 
                echo "Lo sentimos, este sitio web está experimentando problemas.";
            
                // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
                // cómo obtener información del error
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $sql . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            }else{
                while($data = mysqli_fetch_assoc($resultado)){
                    $arreglo["data"][] = $data;
                }
                $respuesta = json_encode($arreglo);
            }
            mysqli_close($mysqli);
            break;
        
        default:
            # code...
            break;
    }
    //var_dump($respuesta);
    echo $respuesta;

}
function consultasSintomas(){
    $metodo = $_REQUEST['metodo'];
    $respuesta = "";
    switch ($metodo) {
        case 'listarSintomas':
            $mysqli = new mysqli('bxqsxwdoasmaf0zorzvi-mysql.services.clever-cloud.com', 'uasrxz4qrh1xinnr', 'WSM9ks7dz2mQJcZ9DUCy', 'bxqsxwdoasmaf0zorzvi');

            // ¡Oh, no! Existe un error 'connect_errno', fallando así el intento de conexión
            if ($mysqli->connect_errno) {
                // La conexión falló. ¿Que vamos a hacer? 
                // Se podría contactar con uno mismo (¿email?), registrar el error, mostrar una bonita página, etc.
                // No se debe revelar información delicada          
                // Probemos esto:
                echo "Lo sentimos, este sitio web está experimentando problemas.";  
                // Algo que no se debería de hacer en un sitio público, aunque este ejemplo lo mostrará
                // de todas formas, es imprimir información relacionada con errores de MySQL -- se podría registrar
                echo "Error: Fallo al conectarse a MySQL debido a: \n";
                echo "Errno: " . $mysqli->connect_errno . "\n";
                echo "Error: " . $mysqli->connect_error . "\n";            
                // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
                exit;
            }
            $sql = "SELECT * FROM SINTOMAS";
            if (!$resultado = $mysqli->query($sql)) {
                // ¡Oh, no! La consulta falló. 
                echo "Lo sentimos, este sitio web está experimentando problemas.";
            
                // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
                // cómo obtener información del error
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $sql . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            }else{
                while($data = mysqli_fetch_assoc($resultado)){
                    $arreglo["data"][] = $data;
                }
                $respuesta = json_encode($arreglo);
            }
            mysqli_close($mysqli);
            break;
        
        default:
            # code...
            break;
    }
    //var_dump($respuesta);
    echo $respuesta;

}