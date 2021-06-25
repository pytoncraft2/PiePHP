<?php
namespace Controller;

use Model;

class UserController extends \Core\Controller
{
    /**
     * Affiche la page passé en parametre de View/User/* [src: Controller]
     */
    public function addAction()
    {
        $this->render('register');
    }

    public function loginAction()
    {

        $this->render('login');
    }

    public function logAction()
    {
        $request = new \Core\Request();
        $tab = $request->post();
        $connectUser = new Model\UserModel();
        if (isset($tab['email']) && isset($tab['password']) && !empty($tab['email']) && !empty($tab['password'])) {
            // $connectUser->findO(['']);
            $rep = $connectUser->findO('users', array(
        'WHERE' => "email = '".$tab['email']."' AND password = '".$tab['password']."'",
        'ORDER BY' => 'id ASC',
        'LIMIT' => '1'));

            if ($rep) {
                $_SESSION['id'] = $rep[0]['id'];
                $_SESSION['email'] = $rep[0]['email'];
                header('Location: /piePHP/user/profil');
            } else {
                $this->render('login', ['error' => 'Mail ou mot de passe incorrect &#128559;']);
            }
        }
    }

    /**
     * Instancie UserModel
     * recupere param requete POST
     * met à jour attr du model
     * appelle sa méthode save
     *
     * @param  string $email    [description]
     * @param  string $password [description]
     * @return [type]           [description]
     */
    public function registerAction($email, $password)
    {
        $request = new \Core\Request();
        $tab = $request->post();
        $newUser = new Model\UserModel();
        print_r($tab);
        if (isset($tab['email']) && isset($tab['pass']) && !empty($tab['email']) && !empty($tab['pass'])) {
            echo "email ok";
            $idUser = $newUser->createO($tab['email'], $tab['pass']);
            $_SESSION['id'] = $idUser;
            $_SESSION['email'] = $tab['email'];
            echo "l id est: ".$_SESSION['id']."l email: ".$_SESSION['email'];
            header('Location: /piePHP/user/profil');
        } else {
            echo "not";
        }
    }

    public function profilAction()
    {

        $connectUser = new Model\UserModel();
        $rep = $connectUser->findO('users', array(
        'WHERE' => "id = '".$_SESSION["id"]."'",
        'ORDER BY' => 'id ASC',
        'LIMIT' => '1'));
        $this->render('profil', ['films' => $rep]);
    }

    public function testAction()
    {
        echo "ouisisismjkml";
    }

    public function suppressionAction()
    {
        $delete = new Model\UserModel();
        $delete->delete('users', $_SESSION['id']);
        echo "compte supprimé &#128076; <br><a href='login'>login</a>";
        session_destroy();
    }
}
