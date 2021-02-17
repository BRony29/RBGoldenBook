    <!-- Modal de connexion -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Administration/login" method="POST" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="honeyPot">
                    <input type="text" class="form-control form-control-sm text-dark bg-light my-2" name="login" placeholder="Login" required>
                    <input type="password" class="form-control form-control-sm text-dark bg-light my-2" name="password" placeholder="Mot de passe" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de déconnexion -->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Administration/logout" method="POST" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Logout.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="modal-title">Est-vous sûr ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal modification login de l'administrateur -->
    <div class="modal fade" id="editLogin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Administration/editLogin" method="POST" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier le login Administrateur.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <input type="hidden" name="honeyPot">
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control form-control-sm text-dark bg-light" name="editLogin" placeholder="Nouveau login" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal modification mot de passe de l'administrateur -->
    <div class="modal fade" id="editPassword" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Administration/editPassword" method="POST" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier le MDP Administrateur.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <input type="hidden" name="honeyPot">
                </div>
                <div class="modal-body">
                    <div class="modal-body0">
                        <input type="password" class="form-control form-control-sm text-dark bg-light mb-2" id="editPassword1" name="editPassword1" placeholder="Nouveau MDP" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required onBlur="checkPass()">
                    </div>
                    <div class="modal-body1">
                        <input type="password" class="form-control form-control-sm text-dark bg-light mt-2" id="editPassword2" name="editPassword2" placeholder="Confirmer le MDP" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required onBlur="checkPass()">
                        <div id="divcomp" class="col-sm-12 mt-1">
                        </div>
                        <h6 class="minititreNoir text-justify my-1"><br>Les mots de passe doivent contenir au minimum 8 caractères dont une minuscule, une majuscule et un chiffre. Les caractères \ / <> & \ ' " sont à exclure.</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary btn-sm" id="btnValid">Valider</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal modification email de l'administrateur -->
    <div class="modal fade" id="editEmail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Administration/editEmail" method="POST" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier l'email Administrateur.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <input type="hidden" name="honeyPot">
                </div>
                <div class="modal-body">
                    <input type="email" class="form-control form-control-sm text-dark bg-light" name="editEmail" placeholder="Nouvel email" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal ajout d'un commentaire -->
    <div class="modal fade" id="ajoutComment" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Goldenbook/addComment" method="POST" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un Commentaire.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="honeyPot">
                    <input type="text" class="form-control form-control-sm text-dark bg-light" name="nickname" placeholder="Pseudo" required>
                    <input type="email" class="form-control form-control-sm text-dark bg-light my-2" name="email" placeholder="Adresse email" required>
                    <textarea class="form-control form-control-sm text-dark bg-light noresize" rows="7" name="comment" placeholder="Commentaire" required></textarea>
                    <h6 class="mt-3 mb-1">L'email est obligatoire, il ne sera pas affiché dans le Golden Book. Tout message irrespecteux sera supprimé.</h6>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de suppression d'un commentaire -->
    <div class="modal fade" id="deleteComment" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Goldenbook/deleteComment" method="POST" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer un commentaire</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <input type="hidden" name="honeyPot">
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control form-control-sm text-dark bg-light my-2" disabled name="idDelete">
                    <h6 class="modal-title">Est-vous sûr ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de modification d'un commentaire -->
    <div class="modal fade" id="editComment" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Goldenbook/editComment" method="POST" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editer un Commentaire.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <input type="hidden" name="honeyPot">
                </div>
                <div class="modal-body">
                    <div class="modal-body0">
                        <input type="text" class="form-control form-control-sm text-dark bg-light" name="nicknameEdit" placeholder="Pseudo" required>
                    </div>
                    <div class="modal-body1">
                        <input type="email" class="form-control form-control-sm text-dark bg-light my-2" name="emailEdit" placeholder="Adresse email" required>
                    </div>
                    <div class="modal-body2">
                        <textarea class="form-control form-control-sm text-dark bg-light noresize" rows="7" name="commentEdit" placeholder="Commentaire" required></textarea>
                    </div>
                    <div class="modal-body3">
                        <input type="hidden" class="form-control form-control-sm text-dark bg-light noresize mt-2" name="idEdit" disabled required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>