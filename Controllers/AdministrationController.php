<?php

namespace RBGoldenBook\Controllers;

use RBGoldenBook\Models\AdministrationModel;

class AdministrationController extends Controller
{
    /**
     * Connexion administrateur
     *
     * @return void
     */
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                isset($_POST['honeyPot']) && empty($_POST['honeyPot'])
                && isset($_POST['login']) && !empty($_POST['login'])
                && isset($_POST['password']) && !empty($_POST['password'])
            ) {
                $login = htmlspecialchars(strip_tags($_POST['login']));
                $password = htmlspecialchars(strip_tags($_POST['password']));
                $administrationModel = new AdministrationModel;
                $administrateur = $administrationModel->find(1);
                if (
                    $login === $administrateur->login
                    && password_verify($password, $administrateur->password)
                ) {
                    $_SESSION['user'] = 'Administrateur';
                    $_SESSION['success'] = 'Bienvenue ' . $administrateur->login;
                    unset($administrateur);
                    $this->redirection();
                } else {
                    unset($administrateur);
                    $_SESSION['error'] = 'Login ou mot de passe incorrect.';
                    $this->redirection();
                }
            }
        }
        $_SESSION['error'] = 'Login ou mot de passe incorrect.';
        $this->redirection();
    }

    /**
     * Déconnexion
     * 
     * @return exit 
     */
    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: ' . '/');
        exit;
    }

    /**
     * Modification du login Administrateur
     *
     * @return void
     */
    public function editLogin()
    {
        if ($_SESSION['user'] === 'Administrateur') {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (
                    isset($_POST['honeyPot']) && empty($_POST['honeyPot'])
                    && isset($_POST['editLogin']) && !empty($_POST['editLogin'])
                ){
                    $donnees = [
                        'login' => htmlspecialchars(strip_tags($_POST['editLogin']))
                    ];
                    $administrationModel = new AdministrationModel;
                    $administrateur = $administrationModel->hydrate($donnees);
                    $administrateur->update(1, $administrationModel);
                    $_SESSION['success'] = 'Le login administrateur est été modifié';
                    $this->redirection();
                }
                $_SESSION['error'] = 'Erreur, champs incorrects ou non remplis !';
                $this->redirection();
            }
        }
        $_SESSION['error'] = 'Erreur, accès refusé !';
        $this->redirection();
    }

    /**
     * Modification du mot de passe Administrateur
     *
     * @return void
     */
    public function editPassword()
    {
        if ($_SESSION['user'] === 'Administrateur') {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (
                    isset($_POST['honeyPot']) && empty($_POST['honeyPot'])
                    && isset($_POST['editPassword1']) && !empty($_POST['editPassword1'])
                    && isset($_POST['editPassword2']) && !empty($_POST['editPassword2'])
                ){
                    $editPassword1 = htmlspecialchars(strip_tags($_POST['editPassword1']));
                    $editPassword2 = htmlspecialchars(strip_tags($_POST['editPassword2']));
                    if ($editPassword1 !== $editPassword2) {
                        $_SESSION['error'] = 'Erreur, Les entrées doivent être identiques !';
                        $this->redirection();
                    }
                    if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$#', $editPassword1)) {
                        if (!($this->validPassword($editPassword1))) {
                            $_SESSION['error'] = 'Erreur, Mot de passe non valide !';
                            $this->redirection();
                        }
                        $donnees = [
                            'password' => password_hash($editPassword1, PASSWORD_BCRYPT)
                        ];
                        $administrationModel = new AdministrationModel;
                        $administrateur = $administrationModel->hydrate($donnees);
                        $administrateur->update(1, $administrationModel);
                        $_SESSION['success'] = 'Le Mot de passe administrateur est été modifié';
                        $this->redirection();
                    }
                }
                $_SESSION['error'] = 'Erreur, champs incorrects ou non remplis !';
                $this->redirection();
            }
        }
        $_SESSION['error'] = 'Erreur, accès refusé !';
        $this->redirection();
    }

    /**
     * Modification email Administrateur
     *
     * @return void
     */
    public function editEmail()
    {
        if ($_SESSION['user'] === 'Administrateur') {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (
                    isset($_POST['honeyPot']) && empty($_POST['honeyPot'])
                    && isset($_POST['editEmail']) && !empty($_POST['editEmail'])
                ){
                    $editEmail = htmlspecialchars(strip_tags($_POST['editEmail']));
                    if (!(filter_var($editEmail, FILTER_VALIDATE_EMAIL))) {
                        $_SESSION['error'] = 'Format d\'email invalide !';
                        $this->redirection();
                    }
                    $donnees = [
                        'email' => $editEmail
                    ];
                    $administrationModel = new AdministrationModel;
                    $administrateur = $administrationModel->hydrate($donnees);
                    $administrateur->update(1, $administrationModel);
                    $_SESSION['success'] = 'L\'email administrateur est été modifié';
                    $this->redirection();
                }
                $_SESSION['error'] = 'Erreur, champs incorrects ou non remplis !';
                $this->redirection();
            }
        }
        $_SESSION['error'] = 'Erreur, accès refusé !';
        $this->redirection();
    }
}
