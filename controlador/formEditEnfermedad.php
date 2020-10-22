<?php
    $idEnfermedad = $_POST['idEditEnfermedad'];
    $nomEditEnfermedad = $_POST['nomEditEnfermedad'];
    $descEditEnfermedad = $_POST['descEditEnfermedad'];
    $relacionEditSistemas = $_POST['relacionEditSistemas'];
    $enlace = $_POST['urlAntiguaEnfermedad'];
    // require('../vendor/autoload.php');
    //     // this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars
    //     $s3 = new Aws\S3\S3Client([
    //         'version'  => '2006-03-01',
    //         'region'   => 'us-east-2',
    //     ]);
    //     $bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');
    //     //$bucket = 'convocatoriaumss';

    //     if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['urlEditEnfermedad']) && $_FILES['urlEditEnfermedad']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['urlEditEnfermedad']['tmp_name'])) {
    //         // FIXME: you should add more of your own validation here, e.g. using ext/fileinfo
    //         try {
    //             // FIXME: you should not use 'name' for the upload, since that's the original filename from the user's computer - generate a random filename that you then store in your database, or similar
    //             $upload = $s3->upload($bucket, $_FILES['urlEditEnfermedad']['name'], fopen($_FILES['urlEditEnfermedad']['tmp_name'], 'rb'), 'public-read');
    //             //Mi Codigo

    //             //$enlace= htmlspecialchars($upload->get('ObjectURL'));
    //             $enlace= $upload->get('ObjectURL');

    //             echo $enlace."\n";

    //         }catch(Exception $e) {
    //             echo $e;
    //         }
    //     }

        $mysqli = new mysqli('bxqsxwdoasmaf0zorzvi-mysql.services.clever-cloud.com', 'uasrxz4qrh1xinnr', 'WSM9ks7dz2mQJcZ9DUCy', 'bxqsxwdoasmaf0zorzvi');
                    if ($mysqli->connect_errno) {
                        echo "Lo sentimos, este sitio web está experimentando problemas.";  
                        echo "Error: Fallo al conectarse a MySQL debido a: \n";
                        echo "Error: " . $mysqli->connect_errno . "\n";
                        echo "Error: " . $mysqli->connect_error . "\n";            
                        exit;
                    }
                    $sql = "UPDATE ENFERMEDAD SET ID_SISTEMAS = '$relacionEditSistemas',NOMBRE_ENFERMEDAD = '$nomEditEnfermedad',DESCRIP_ENFERMEDAD = '$descEditEnfermedad',LINK_IMAGEN = '$enlace' WHERE ID_ENFERMEDADES = '$idEnfermedad'";
                    if (!$resultado = $mysqli->query($sql)) {
                        // ¡Oh, no! La consulta falló. 
                        echo "Lo sentimos, este sitio web está experimentando problemas.";
                        echo "Error: La ejecución de la consulta falló debido a: \n";
                        echo "Query: " . $sql . "\n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit;
                    }else{
                        mysqli_close($mysqli);
                        echo "Actualizacion realizada";
                        //header("Location:../home_usuario.php?estado=success");
                    }    
