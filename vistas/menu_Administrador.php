<!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index_admin.php">La Súper 7</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index_admin.php">Inicio</a>
                    </li>
                    <li>
                        <a href="materiales.php">Materiales</a>
                    </li>
                    <li>
                        <a href="clientes.php">Clientes</a>
                    </li>
                    <li>
                        <a href="cotizacion.php">Cotizaciones</a>
                    </li>                    
                    <li>
                        <a href="catalogo.php">Catálogo</a>
                    </li>
                    <li>
                        <div class="dropdown">
                          <button id="dLabel" class="btn-class-admin" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administrador
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li class="dropdown-header">Sesiones</li>
                            <li>
                                <a href="usuarios.php">Usuarios</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Materiales</li>
                            <li>
                                <a href="propiedades.php">Propiedades</a>
                            </li>
                            <li>
                                <a href="u_medida.php">Unidad de Medida</a>
                            </li>
                            <li>
                                <a href="clase.php">Clases</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Gestión</li>
                            <li>
                                <a href="reportes.php">Reportes</a>
                            </li>
                          </ul>
                        </div>
                    </li>                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>