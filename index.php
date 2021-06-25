<?php
/**
* Projet PiePHP.
*
* Reproduction d'un framework de A à Z
*
* @package PiePHP
* @copyright 2021 teamOt
* @author timothee.hennequin@epitech.eu
*/

/**
 * stock l'url absolue (/piePHP)
 * @var mixed BASE_URI
 */

define ('BASE_URI', str_replace('\\', '/', substr( __DIR__ , strlen( $_SERVER['DOCUMENT_ROOT']))));

/**
 * Permet d'instancier les class du dossier Controller et Core
 * @var mixed require_once
 */
require_once(implode(DIRECTORY_SEPARATOR,['Core', 'autoload.php']));
require_once('src/routes.php');
session_start();
$app = new Core\Core();
$app->run();

// $test = new Core\Database();
// $test->connect_to_db();
