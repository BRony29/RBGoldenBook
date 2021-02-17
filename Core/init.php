<?php

namespace RBGoldenBook\Core;

setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);

session_start();

//Timeout de session
if (!isset($_SESSION['timeout'])){
    $_SESSION['timeout']=time();
}
if(time() - $_SESSION['timeout'] > 600) {
    session_destroy();
    session_start();
}
$_SESSION['timeout']=time();

// Initialisation des sessions sur l'invité un visiteur (non connecté)
if (!isset($_SESSION['user']) || is_null($_SESSION['user'])){
    $_SESSION['user'] = 'Visiteur';
}