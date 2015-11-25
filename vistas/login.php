<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>La Súper 7 admin Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/business-casual.css" rel="stylesheet">

    <!-- Fonts 
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <br><br><br>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">                
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center"><a href="../../brick_web/" title="Regresar al inicio."><span class="glyphicon glyphicon-home inicio-admin-icon"></span></a> Inicio de Sesión</h3>
                    </div>
                    <div class="panel-body">
                        <!-- --> 
                           <h3 class="text-center">Brick</h3>               
                           <h1 class="flaticon-wall20 text-center logo-icono"></h1>
                        <!-- -->
                        <form role="form" action="../controller/login_autentica.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input id="username" name="username" class="form-control" placeholder="Usuario" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input id="password" name="password" class="form-control" placeholder="Contraseña" type="password" value="">
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form --> 
                                <button id="btn_login" class="btn btn-lg btn-success btn-block">Ingresar</button>                               
                            </fieldset>
                        </form>
                        <!---->
                        <h5 class="text-center"><a href="registro.php"><i class="glyphicon glyphicon-ok-circle"></i> Registrarse</a></h5>
                    </div>                   
                </div>
            </div>            
        </div>
    </div>

</body>

</html>
