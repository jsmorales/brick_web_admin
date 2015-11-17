<?php 
    include("../controller/registroController.php");
    $registro = new RegistroController();
 ?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>La Súper 7 Registro</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/business-casual.css" rel="stylesheet">

    <!-- Fonts 
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css"> -->
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif] -->

</head>

<body>

    <div class="container">
        <br><br><br>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">                
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Registro Cliente</h3>
                    </div>
                    <div class="panel-body">

                    <!-- Nav tabs -->
                      <ul class="nav nav-tabs nav-modal" role="tablist">
                        <li role="presentation" class="active"><a href="#usuario" aria-controls="usuario" role="tab" data-toggle="tab">Usuario</a></li>
                        <li role="presentation"><a href="#cliente" aria-controls="cliente" role="tab" data-toggle="tab">Cliente</a></li>
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">

                        <div role="tabpanel" class="tab-pane active" id="usuario">
                            <br>
                            <form role="form" id="form_registro">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="alias">Nombre de Usuario</label>
                                        <input id="alias" name="alias" class="form-control" placeholder="Nombre Usuario" type="text" required="true" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="pass" class="">Contraseña</label>
                                        <input id="pass" name="pass" class="form-control" placeholder="Contraseña" type="password" required="true" value="">
                                    </div>
                                    <!--  -->
                                    <div class="form-group" hidden="">                                        
                                        <input id="nombres" name="nombres" class="form-control" placeholder="nombres" type="text" required="true">
                                    </div>
                                    <div class="form-group" hidden="">                                        
                                        <input id="apellidos" name="apellidos" class="form-control" placeholder="apellidos" type="text" required="true">
                                    </div>
                                    <div class="form-group" hidden="">                                        
                                        <input id="numero_cc" name="numero_cc" class="form-control" placeholder="numero_cc" type="text" required="true">
                                    </div>
                                    <div class="form-group" hidden="">
                                        <label for="fkID_tipo" class="">fkID_tipo</label>
                                        <input id="fkID_tipo" name="fkID_tipo" class="form-control" placeholder="" type="text" required="true" value="3">
                                    </div>
                                    <!--  -->                                                                               
                                </fieldset>
                            </form>
                            <!---->                         

                        </div>
                        <div role="tabpanel" class="tab-pane" id="cliente">
                            
                            <br>
                            <form role="form" id="form_cliente">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="num_cc">Número de cédula</label>
                                        <input id="num_cc" name="num_cc" class="form-control" placeholder="Número de cédula" type="number" required="true" autofocus>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="nom_cliente">Nombres</label>                                       
                                        <input id="nom_cliente" name="nom_cliente" class="form-control" placeholder="nombres" type="text" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="ape_cliente">Apellidos</label>                                        
                                        <input id="ape_cliente" name="ape_cliente" class="form-control" placeholder="apellidos" type="text" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>                                        
                                        <input id="telefono" name="telefono" class="form-control" placeholder="telefono" type="text" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>                                        
                                        <input id="direccion" name="direccion" class="form-control" placeholder="direccion" type="text" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo Electrónico</label>                                       
                                        <input id="email" name="email" class="form-control" placeholder="email" type="email" required="true">
                                    </div>
                                    <!--  -->                                                                               
                                </fieldset>
                            </form>
                            <!---->

                            <!-- Change this to a button or input when using this as a form --> 
                            <button id="btn_actionRegistro" data-action="crear" class="btn btn-lg btn-success btn-block">Crear Registro</button>

                        </div>

                      </div>

                    </div>                   
                </div>
            </div>            
        </div>
    </div>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/plugins/validav1/valida_p_v1.js"></script>
<script src="../js/scripts_cont/cont_registro_cliente.js"></script>
</body>

</html>
