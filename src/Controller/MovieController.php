<?php
namespace Controller;

use Model;

class MovieController extends \Core\Controller
{
    public function filmlisteAction()
    {
        $filmListe = new Model\UserModel();
        $films = $filmListe->findO('film', array(
        'LIMIT' => '50'));


        $this->render('film', ['films' => $films]);
    }

    public function resumAction()
    {
        $request = new \Core\Request();
        $tab = $request->post();
        $resum = new Model\UserModel();
        $films = $resum->findO('film', array(
          'WHERE' => 'titre = "'.$tab['resum'].'"',
        'LIMIT' => '50'));
        $this->render('resum', ['films' => $films]);
    }
    public function findAction()
    {
        $request = new \Core\Request();
        $tab = $request->post();
        $filmListe = new Model\UserModel();
        $films = $filmListe->findO('film', array(
          'WHERE' => 'titre LIKE "'.$tab['find'].'%"',
        'LIMIT' => '50'));

        $this->render('film', ['films' => $films]);
    }

    public function addmovieAction()
    {
        $request = new \Core\Request();
        $tab = $request->post();
        $addMovie = new Model\UserModel();
        $addMovie->updateO('users', $_SESSION['id'] , ['films' => $tab["addmovie"]]);
            header('Location: /piePHP/movie/filmliste');
    }

    public function deleteAction($value='')
    {
    }
}
