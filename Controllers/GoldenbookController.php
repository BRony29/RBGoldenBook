<?php

namespace RBGoldenBook\Controllers;

use RBGoldenBook\Models\AdministrationModel;
use RBGoldenBook\Models\GoldenbookModel;

class GoldenbookController extends Controller
{
    /**
     * Affichage Golden Book
     *
     * @return void
     */
    public function index()
    {
        $goldenbookModel = new GoldenbookModel;
        $goldenbooks = $goldenbookModel->findAllDesc();
        $this->render('goldenbook/index', compact('goldenbooks'));
    }

    /**
     * Ajout d'un commentaire
     *
     * @return void
     */
    public function addComment()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                isset($_POST['honeyPot']) && empty($_POST['honeyPot'])
                && isset($_POST['nickname']) && !empty($_POST['nickname'])
                && isset($_POST['email']) && !empty($_POST['email'])
                && isset($_POST['comment']) && !empty($_POST['comment'])
            ) {
                if (!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
                    $_SESSION['error'] = 'Adresse email non valide';
                    $this->redirection();
                }
                $donnees = [
                    'nickname' => htmlspecialchars(strip_tags($_POST['nickname'])),
                    'email' => htmlspecialchars(strip_tags($_POST['email'])),
                    'date' => date("Y-m-d  H:i:s"),
                    'comment' => htmlspecialchars(strip_tags($_POST['comment'])),
                ];
                $goldenbookModel = new GoldenbookModel;
                $goldenbook = $goldenbookModel->hydrate($donnees);
                $goldenbook->create($goldenbook);
                $this->CommentMail($donnees);
                $_SESSION['success'] = 'Merci, votre message a été ajouté.';
                $this->redirection();
            }
        }
        $_SESSION['error'] = 'Erreur, champs incorrects ou non remplis !';
        $this->redirection();
    }

    /**
     * Suppression d'un commentaire
     *
     * @return void
     */
    public function deleteComment()
    {
        if ($_SESSION['user'] === 'Administrateur') {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (
                    isset($_POST['honeyPot']) && empty($_POST['honeyPot'])
                    && isset($_POST['idDelete']) && !empty($_POST['idDelete'])
                ) {
                    $idDelete = htmlspecialchars(strip_tags($_POST['idDelete']));
                    if (!$this->CommentExist($idDelete)){
                        $_SESSION['error'] = 'Erreur, ce commentaire n\'existe pas !';
                        $this->redirection();
                    }
                    $goldenbookModel = new GoldenbookModel;
                    $goldenbookModel->delete($idDelete);
                    $_SESSION['success'] = 'Commentaire supprimé.';
                    $this->redirection();
                }
            }
        }
        $_SESSION['error'] = 'Erreur, accès refusé !';
        $this->redirection();
    }

    /**
     * Edition d'un commentaire
     *
     * @return void
     */
    public function editComment()
    {
        if ($_SESSION['user'] === 'Administrateur') {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (
                    isset($_POST['honeyPot']) && empty($_POST['honeyPot'])
                    && isset($_POST['nicknameEdit']) && !empty($_POST['nicknameEdit'])
                    && isset($_POST['emailEdit']) && !empty($_POST['emailEdit'])
                    && isset($_POST['commentEdit']) && !empty($_POST['commentEdit'])
                    && isset($_POST['idEdit']) && !empty($_POST['idEdit'])
                ) {
                    if (!(filter_var($_POST['emailEdit'], FILTER_VALIDATE_EMAIL))) {
                        $_SESSION['error'] = 'Adresse email non valide';
                        $this->redirection();
                    }
                    $idEdit = htmlspecialchars(strip_tags($_POST['idEdit']));
                    if (!$this->CommentExist($idEdit)){
                        $_SESSION['error'] = 'Erreur, ce commentaire n\'existe pas !';
                        $this->redirection();
                    }
                    $donnees = [
                        'nickname' => htmlspecialchars(strip_tags($_POST['nicknameEdit'])),
                        'email' => htmlspecialchars(strip_tags($_POST['emailEdit'])),
                        'comment' => htmlspecialchars(strip_tags($_POST['commentEdit'])),
                    ];
                    $goldenbookModel = new GoldenbookModel;
                    $goldebook = $goldenbookModel->hydrate($donnees);
                    $goldebook->update($idEdit, $goldenbookModel);
                    $_SESSION['success'] = 'Le message a été modifié.';
                    $this->redirection();
                }
            }
        }
        $_SESSION['error'] = 'Erreur, accès refusé !';
        $this->redirection();
    }

    /**
     * Envoi d'un mail à l'administrateur lorsqu'un commentaire est ajouté.
     *
     * @param array $donnees : données entrées par l'utilisateur lors de la rédaction de son commentaire
     * @return void
     */
    public function commentMail(array $donnees): void
    {
        $administrationModel = new AdministrationModel;
        $to = $administrationModel->find(1)->email;
        $msg = "Pseudo : " . $donnees['nickname'];
        $msg .= "\nEMAIL : " . $donnees['email'];
        $msg .= "\nDATE : " . $donnees['date'];
        $msg .= "\nMESSAGE :" . $donnees['comment'] . "\n";
        $subject = "SUJET : Nouveau Commentaire dans le Golden Book";
        $headers = "From: formulaire. ";
        $headers .= "Reply-To: " . $donnees['email'] . "\n\n";
        mail($to, $subject, $msg, $headers);
    }

    /**
     * Vérification de l'existence d'un commentaire
     *
     * @param integer $id : Id du commentaire à vérifier
     * @return bool
     */
    public function CommentExist(int $id):bool
    {
        if ($_SESSION['user'] === 'Administrateur') {
            $goldenbookModel = new GoldenbookModel;
            $goldenbook = $goldenbookModel->findBy(['id'=>$id]);
            if (count($goldenbook) == 1) {
                return true;
            } else {
                return false;
            }
        }
        $_SESSION['error'] = 'Erreur, accès refusé !';
        $this->redirection();
    }
}
