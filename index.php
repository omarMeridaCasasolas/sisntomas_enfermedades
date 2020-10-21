<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
</head>
<body class="bg-secondary">
    <main class="bg-dark container text-white my-4 p-3">
        <h1 class="text-center">LOGIN ENFERMEDADES Y DIAGNOSTICO</h1>
            <form action="controlador/formSessionUsuario.php" method="post">
                <div class="form-group">
                    <label for="loginUsser">Ingrese su correo electronico</label>
                    <input type="text" name="loginUsser" id="loginUsser" class="form-control">
                </div>
                <div class="form-group">
                    <label for="passwordUser">Igrese su password: </label>
                    <input type="password" name="passwordUser" id="passwordUser" class="form-control">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Ingresar">
                </div>
            </form>
    </main>
</body>
</html>