<?php
namespace Core;

class Core
{
    /**
     * execute la methode du dossier de la classe Controller selon l'url passé en parametre
     * @return mixed valeur qui change selon la classe instancié
     */
    public function run()
    {
        $c = 'Controller';
        $a = 'Action';
        $str = $_SERVER[REQUEST_URI];
        $class = explode("/", $str)[2] . $c;
        $method = explode("/", $str)[3] . $a;
        $ctrl = '\Controller\\'.ucfirst($class);
        if (class_exists('\Controller\\'.ucfirst($class)) && method_exists($ctrl, $method)) {
            // echo "class exist et method ok";
            $exec = new $ctrl();
            $exec->$method();
        } else {
          echo "Erreur 404 &#129335;&#8205;&#9794;&#65039";
        }
    }
}
