<?php
    
    include('../controller/indexController.php');

    $nombre = $_COOKIE["log_brick_nombre"];
    $alias = $_COOKIE["log_brick_alias"];
    $tipo = $_COOKIE["log_brick_tipo"];
 ?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>La Súper 7 admin</title>

    <!-- iconos -->
    <link href="../css/iconos/flaticon.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/business-casual.css" rel="stylesheet">

    <!-- Fonts 
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- css para DataTables -->
    <link href="../js/plugins/DataTables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <?php  

        $encabezado = new indexController();

        $encabezado->titulo_encabezado();
    ?>
    
    <div class="address-bar"><span class="glyphicon glyphicon-user"></span>  <?php echo $nombre." | ".$tipo; ?> | <a class="logout-link" href="../controller/logout.php">Salir</a> </div>