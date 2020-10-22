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
    <main class="bg-white container my-4 p-3">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Crear nueva enfermedad
        </button>
         <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header bg-success">
                        <h4 class="modal-title">Crear Enfermedad</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="../controlador/formCrearEnfermedad.php" method="post"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nomEnfermedad">Ingrese nombre de la enfermedad: </label>
                                <input type="text" name="nomEnfermedad" id="nomEnfermedad" class="form-control" required> 
                            </div>
                            <div class="form-group">
                                <h5>Descripcion de la enfermedad</h5>
                                <textarea name="descEnfermedad" id="descEnfermedad"  rows="10" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="relacionSistemas">Enfermedad relacionada con : </label>
                                <select class="selectEnfermedades form-control" id="relacionSistemas" name="relacionSistemas" required>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="urlEnfermedad">Ingrese imagen de la enfermedad: </label>
                                <input type="file" name="urlEnfermedad" id="urlEnfermedad" class="form-control" accept="image/*" required>
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Ingresar enfermedad" class="btn btn-primary"> 
                                <button type="button" class="btn btn-danger" class="close" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- editar enfermedades -->
        <button type="button" class="d-none" data-toggle="modal" data-target="#myModal2" id="vtnOpenEditEnfermedad">
        </button>
         <!-- The Modal -->
        <div class="modal fade" id="myModal2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header bg-warning">
                        <h4 class="modal-title">Editar Enfermedades</h4>
                        <button type="button" class="close" data-dismiss="modal" id="vtnClosedEditEnfermedad">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="../controlador/formEditEnfermedad.php" id="formEditEnfermedad" method="post"  enctype="multipart/form-data">
                            <input type="text" class="d-none" name="idEditEnfermedad" id="idEditEnfermedad">
                            <div class="form-group">
                                <label for="nomEditEnfermedad">Ingrese nombre de la enfermedad: </label>
                                <input type="text" name="nomEditEnfermedad" id="nomEditEnfermedad" class="form-control" required> 
                            </div>
                            <div class="form-group">
                                <h5>Descripcion de la enfermedad</h5>
                                <textarea name="descEditEnfermedad" id="descEditEnfermedad"  rows="10" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="relacionEditSistemas">Enfermedad relacionada con : </label>
                                <select class="form-control selectEnfermedades" id="relacionEditSistemas" name="relacionEditSistemas" required>

                                </select>
                            </div>
                            <div class="form-group">
                                <h5> Enlace anterio de la imagen era : <a href="" id="LinkEditImage" target="_blank"> imagen</a></h5>
                                <div class="text-center">
                                    <img  src="" id="viewImageEdit" alt="text related to image"  height="190">
                                </div>
                                <br>
                                <label for="urlEditEnfermedad">Ingrese imagen de la enfermedad: </label>
                                <input type="file" name="urlEditEnfermedad" id="urlEditEnfermedad" class="form-control" accept="image/*">
                                <input type="text" class="d-none" name="urlAntiguaEnfermedad" id="urlAntiguaEnfermedad">
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Actualizar Enfermedad" class="btn btn-primary"> 
                                <button type="button" class="btn btn-danger" class="close" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Eliminar enfermedades -->
        <button type="button" class="d-none" data-toggle="modal" data-target="#myModal3" id="vtnOpenEliminarEnfermedad">
        </button>
         <!-- The Modal -->
        <div class="modal fade" id="myModal3">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header bg-danger">
                        <h4 class="modal-title">Editar Enfermedades</h4>
                        <button type="button" class="close" data-dismiss="modal" id="vtnClosedEliminarEnfermedad">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" id="formEliminarEnfermedad" method="post"  enctype="multipart/form-data">
                            <input type="text" class="d-none" name="idEliminarEnfermedad" id="idEliminarEnfermedad">
                            <h6>Estas seguro que quiere eliminar la imagane <span id="urlEliminarEnfermedad"></span></h6>
                            <div class="text-center">
                                    <img  src="" id="viewImageEliminar" alt="text related to image"  height="190">
                                </div>
                            <div class="text-center mt-2">
                                <input type="submit" value="Si" class="btn btn-primary"> 
                                <button type="button" class="btn btn-danger" class="close" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  
        <h1 class="text-center">Tabla de enfermedades</h1>
        <table id="tableEnfermedades">
            <thead>
                <th>ID Sistema</th>
                <th>Nombre enfermedad</th>
                <th>Descripcion</th>
                <th>URL img</th>
                <th>Opciones</th>
            </thead>
        </table>
        <hr>
        <h1 class="text-center">Tipo de sistemas del cuerpo</h1>
        <table id="tableSistemaHumano">
            <thead>
                <th>Identificador</th>
                <th>Nombre sistema</th>
                <th>Enlace del sistema</th>
                <th>Tipo del sistema</th>
                <th>Opciones</th>
            </thead>
        </table>

        <hr>
        <h1 class="text-center">Sintomas</h1>
        <table id="tableSintomas">
            <thead>
                <th>Identificador</th>
                <th>Nombre sintoma</th>
                <th>Enlace</th>
                <th>Opciones</th>
            </thead>
        </table>
    </main>
    <script src="src/home_usuario.js"></script>
</body>
</html>