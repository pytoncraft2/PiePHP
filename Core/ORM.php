<?php
/**
 * ORM
 */
namespace Core;

class ORM extends \Core\Database
{

  /**
   * Connexion à la BDD pour utiliser $this->pdo->query ...
   */
    public function __construct()
    {
        $this->connect_to_db();
    }

    /**
     * creation tableaux dans BDD
     * @param  string $tab nom du tableau cible
     * @param  array $arr liste des valeurs à inserrer
     * @return void
     */

    public function create($tab, $arr)
    {
        $Wkey = "";
        $Wvalue = "";

        foreach ($arr as $key => $value) {
            $Wkey .= $key . ",";
            $Wvalue .= '"' . $value . '",';
        }

        $Wkey = substr($Wkey, 0, -1);
        $Wvalue = substr($Wvalue, 0, -1);

        $req = $this->pdo->prepare("INSERT INTO $tab ($Wkey) VALUES ($Wvalue)");
        $req->execute();
    }

    /**
     * Affiche info du tableau de la BDD selon l'id passé en paramètre
     * @param  int $id  id de l'utilisateur
     * @param  string $tab nom du tableau cible
     * @return array      liste des resultat du tableau
     */

    public function read($id, $tab = null)
    {
        $req = $this->pdo->query("SELECT * FROM $tab WHERE id = $id");
        $res = $req->fetchAll();
        return $res;
    }

    /**
     * Met à jour valeur du tableau de la BDD
     * @param  string $tab nom du tableau
     * @param  int $id  id de l'utilisateur
     * @param  array $arr
     * @return void
     */

    public function update($tab, $id, $arr)
    {
        foreach ($arr as $key => $value) {
            $val = "'" . $value . "'";
            $req = $this->pdo->prepare("UPDATE $tab SET $key = $val WHERE id = $id");
            $req->execute();
        }
    }

/**
 * Supprime tableau
 * @param  [type] $tab [description]
 * @param  [type] $id  [description]
 * @return [type]      [description]
 */

    public function delete($tab, $id)
    {
        $query = "DELETE FROM ".$tab . " WHERE id = :id";
        $exec = $this->pdo->prepare($query);

        if ($exec->execute(array('id' => $id))) {
            return true;
        } else {
            return false;
        }
    }

    public function find($tab, $params = array(
  'WHERE' => 'id = 1',
  'ORDER BY' => 'id ASC',
  'LIMIT' => '1'))
    {
        $test = "";
        foreach ($params as $keys => $values) {
            $test .= $keys . " " . $values . " ";
        }
        $req = $this->pdo->prepare("SELECT * FROM $tab $test");
        $req->execute();
        $rep = $req->fetchAll();
        return $rep;
    }

    /**
     * Recupere derniere id pour l'inscription
     * @return int 
     */

    public function lastValue()
    {
        $req = $this->pdo->prepare("SELECT * from (SELECT id FROM users ORDER BY id DESC LIMIT 1) users ORDER BY id LIMIT 1");
        $req->execute();
        $rep = $req->fetch();
        return $rep;

        // code...
    }
}
