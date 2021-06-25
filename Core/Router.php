<?php
namespace Core;
/**
 * permet d’ajouter une route à votre framework,
 * et une méthode get qui renvoie un tableau contenant le controller et l’action à appeler en fonction des
 * routes pré-définies dans connect et de l’URL courante.
 * une méthode connect qui permet d’ajouter une route à votre framework,
 * et une méthode get qui renvoie un tableau contenant le controller et l’action à appeler en fonction des
 * routes pré-définies dans connect et de l’URL courante
 */

class Router
{

  /**
   * static
   * @var array
   */

    private static $routes ;

    /**
     *
     * @param  array $url   url
     * @param  array $route route
     * @return array        [description]
     */

    public static function connect($url, $route)
    {
        self::$routes[$url] = $route;
    }

    /**
     * recoit url pour routes.php
     * @param  array $url liste action et methode
     * @return array      Controller app
     */

    public static function get($url)
    {
        return self::$routes[$url];
    }

}
