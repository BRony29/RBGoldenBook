<?php

namespace RBGoldenBook\Controllers;

use RBGoldenBook\Models\EventsModel;

abstract class Controller
{
    /**
     * Envoi des infos collectées à la vue afin d'afficher la page demandée
     *
     * @param string $fichier
     * @param array $datas
     * @return void
     */
    public function render(string $fichier, array $datas1 = [], array $datas2 = [])
    {
        extract($datas1);
        extract($datas2);
        ob_start();
        require_once ROOT . '/RBGoldenBook/views/header.php';
        $header = ob_get_clean();
        ob_start();
        require_once ROOT . '/RBGoldenBook/views/' . $fichier . '.php';
        $contenu = ob_get_clean();
        ob_start();
        require_once ROOT . '/RBGoldenBook/views/modals.php';
        $modals = ob_get_clean();
        ob_start();
        require_once ROOT . '/RBGoldenBook/views/footer.php';
        $footer = ob_get_clean();
        require_once ROOT . '/RBGoldenBook/views/default.php';
    }


    /**
     * gestion des redirections
     *
     * @return void
     */
    public function redirection()
    {
        if (isset($_SESSION['redirect']) && !empty($_SESSION['redirect'])) {
            header('location: ' . $_SESSION['redirect']);
            exit;
        } else {
            header('location: /Goldenbook/index');
            exit;
        }
    }

    /**
     * Invalider un changement de mot de passe s'il contient certains caractères.
     *
     * @param string $aVerifier
     * @return boolean
     */
    public function validPassword(string $aVerifier): bool
    {
        $tabs = ['\\', '/', '<', '>', '&', '\'', '"'];
        foreach ($tabs as $tab) {
            if (strpos($aVerifier, $tab)) return false;
        }
        return true;
    }
}
