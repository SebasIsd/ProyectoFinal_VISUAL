<?php
class EnlacesPaginas{
public static function enlacesPaginasModel($enlacemodel){


    if ($enlacemodel== "nosotros"||
        $enlacemodel== "servicios" ||
        $enlacemodel== "contactanos" ||
        $enlacemodel== "login" ) 

        {
               $module= "views/".$enlacemodel.".php";

        }
        else{
            $module="views/inicio.php";
        }
        return $module;
}

}

?>