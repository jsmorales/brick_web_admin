<?php 

    include("../controller/catalogoController.php");

    $catalogo = new catalogoController();

 ?>
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
<div class="container">

	<div class="row">

        <div class="box">

                <div class="col-lg-12">

                	<hr>
                    <h1 class="text-center">Catálogo De Materiales</h1>
        		    <hr>
                    <br>
                    <div>
                    <?php 
                        $materiales = $catalogo->getMateriales1();
                        //print_r($materiales);

                        //valida si hay materiales
                        if($materiales){

                            for($a=0;$a<sizeof($materiales);$a++){

                             $id = $materiales[$a]["pkID"];
                             $nombre = $materiales[$a]["nombre"];
                             $precio = $materiales[$a]["precio"];
                             $marca = $materiales[$a]["marca"];
                             $imagen = $materiales[$a]["imagen"];
                             $clase = $materiales[$a]["nom_clase"];

                             if ($imagen == NULL) {
                                $imagen = "no_item.jpg";
                             }

                            echo '
                                <div class="col-lg-4">
                                  <img src="subidas/'.$imagen.'" alt="" class="img-mini-catalogo" width="200px" height="200px">
                                  <ul class="list-group">                                      
                                      <li class="list-group-item"><strong>Nombre: </strong>'.$nombre.'</li>
                                      <li class="list-group-item"><strong>Precio: </strong>$'.$precio.'</li>
                                      <li class="list-group-item"><strong>Marca: </strong>'.$marca.'</li>
                                  </ul>
                              </div>
                            ';
                            };
                        }
                        
                     ?>                   
                      
                    </div>
                    
                </div>
        </div>

    </div>

</div>