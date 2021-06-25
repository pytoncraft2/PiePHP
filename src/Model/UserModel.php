<?php
namespace Model;

use \Core\ORM;

class UserModel extends \Core\Database
{
    private $email;
    private $password;
    public function __construct()
    {
        $this->connect_to_db();
    }

    public function create($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
        $req2 = $this->pdo->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
        $req2->bindValue(":email", $email);
        $req2->bindValue(":password", $password);
        $req2->execute();
    }

    public function read($id)
    {
        $req = $this->pdo->query("SELECT * FROM users WHERE id = $id");
        $res = $req->fetchAll();
        foreach ($res as $key) {
            echo $key['email'].'<br>';
            echo $key['password'].'<br>';
        }
    }

    public function createO($email, $password)
    {
        $orm = new \Core\ORM();
        $orm->create('users', array(
        'email' => $email,
        'password' => $password ));
        $return = $orm->lastValue();
        return $return[0];

    }

    public function readO($value='')
    {
        $orm = new \Core\ORM();
        $res = $orm->read(3, 'users');
        // print_r($res);
    }


    public function updateO($tab,$id,$arr)
    {
      $orm = new \Core\ORM();
      $res = $orm->update($tab,$id,$arr);
    }


    public function delete($tab,$id)
    {
      $orm = new \Core\ORM();
      $orm->delete($tab,$id);
    }

    public function findO($what,$param)
    {
      $orm = new \Core\ORM();
      return $orm->find($what, $param);

    }
}
