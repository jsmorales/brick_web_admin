<?php 

//-----------------------------------------------------------
//error_reporting(0);
//-----------------------------------------------------------

include("valida.php");
include "scripts_cont.php";

    class mostrar extends valida {

        public $script;

        public function __construct(){

            $this->script = new scripts_pag();
        }
        //------------------------------------------------------------
        private function muestra_encabezado(){

            include "encabezado_admin.php";
            include "menu_admin.php";
        }

        private function muestra_pie(){

            include "footer_admin.php";
        }

        private function scripts_normal(){          

            $this->script->standar();

        }

        private function scripts_special($arr_script){
            $this->script->special($arr_script);
        }

        private function fin_pagina(){

            echo "</body>

                    </html>";
        }
        //---------------------------------------------------------------

        //---------------------------------------------------------------
        public function mostrar_pagina($pagina){

            $valores_login = $this->valida_vals();

            if($valores_login == true){

                //muestra las paginas de administrador
                //-----------------------------------------------------------
                $this->muestra_encabezado();
				//include "menu_lateral.php";
                //-----------------------------------------------------------                

                //-----------------------------------------------------------
                //contenido
                include $pagina;
                //-----------------------------------------------------------
                $this->muestra_pie();

                $this->scripts_normal();             

                $this->fin_pagina();              

            }else{                
                 $this->mensaje_error();                 
            }
            
        }
        //-----------------------------------------
        public function mostrar_pagina_scripts($pagina,$arr_script){

            $valores_login = $this->valida_vals();

            if($valores_login == true){

                //muestra las paginas de administrador
                //-----------------------------------------------------------
                $this->muestra_encabezado();
                //include "menu_lateral.php";
                //-----------------------------------------------------------                

                //-----------------------------------------------------------
                //contenido
                include $pagina;
                //-----------------------------------------------------------
                $this->muestra_pie();

                $this->scripts_special($arr_script);             

                $this->fin_pagina();              

            }else{                
                 $this->mensaje_error();                 
            }
            
        }     
    }

 ?>