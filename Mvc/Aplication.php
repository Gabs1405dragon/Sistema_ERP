<?php  
define("PATH_FULL","http://localhost/teste/git/Mvc/Views/pages");


class Aplication{
    public static function Execute(){
       $url = isset($_GET['url']) ? explode('/',$_GET['url'])[0] : 'Home';
       $url = ucfirst($url);
       $url.="Controller";
       if(file_exists('Controllers/'.$url.'.php')){
        $className = 'Controllers\\'.$url;
        $controler = new $className;
        $controler->Index();
       }else{
           die('Não existe esse Controlador');
       }
    }
}