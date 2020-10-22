<?php
    if(isset($_POST['nomEnfermedad'])){
        $nomEnfermedad = $_POST['nomEnfermedad'];
        $descEnfermedad = $_POST['descEnfermedad'];
        $relacionSistemas = $_POST['relacionSistemas'];

        require('../vendor/autoload.php');
        // this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars
        $s3 = new Aws\S3\S3Client([
            'version'  => '2006-03-01',
            'region'   => 'us-east-2',
        ]);
        $bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');
        //$bucket = 'convocatoriaumss';

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['urlEnfermedad']) && $_FILES['urlEnfermedad']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['urlEnfermedad']['tmp_name'])) {
            // FIXME: you should add more of your own validation here, e.g. using ext/fileinfo
            try {
                // FIXME: you should not use 'name' for the upload, since that's the original filename from the user's computer - generate a random filename that you then store in your database, or similar
                $upload = $s3->upload($bucket, $_FILES['urlEnfermedad']['name'], fopen($_FILES['urlEnfermedad']['tmp_name'], 'rb'), 'public-read');
                //Mi Codigo

                //$enlace= htmlspecialchars($upload->get('ObjectURL'));
                $enlace= $upload->get('ObjectURL');

                echo $enlace."\n";
                
                $mysqli = new mysqli('bxqsxwdoasmaf0zorzvi-mysql.services.clever-cloud.com', 'uasrxz4qrh1xinnr', 'WSM9ks7dz2mQJcZ9DUCy', 'bxqsxwdoasmaf0zorzvi');
                    if ($mysqli->connect_errno) {
                        echo "Lo sentimos, este sitio web está experimentando problemas.";  
                        echo "Error: Fallo al conectarse a MySQL debido a: \n";
                        echo "Error: " . $mysqli->connect_errno . "\n";
                        echo "Error: " . $mysqli->connect_error . "\n";            
                        exit;
                    }
                    $sql = "INSERT INTO ENFERMEDAD(ID_SISTEMAS,NOMBRE_ENFERMEDAD,DESCRIP_ENFERMEDAD,LINK_IMAGEN) VALUES('$relacionSistemas', '$nomEnfermedad', '$descEnfermedad', '$enlace')";
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
                        echo "Insercion realizada";
                        header("Location:../home_usuario.php");
                    }
                mysqli_close($mysqli);
                // if($res){
                //     echo "se subio correctamente el archivo";
                // }else{
                //     echo "Error al subir los archivos";
                // }
                //header("Location:../CRUD_publicaciones.php");
            }catch(Exception $e) {
                echo $e;
            }
        }
    }else{
        echo "Error al encontrar el video";
    }

