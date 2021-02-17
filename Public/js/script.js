/* Modal Bootstrap 5 de suppression d'un commentaire */

var deleteComment = document.getElementById('deleteComment');
deleteComment.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget;
    var idDelete = button.getAttribute('data-bs-idDelete');
    var modalBodyInput = deleteComment.querySelector('.modal-body input');
    modalBodyInput.value = idDelete;
})

/* Modal Bootstrap 5 de modification d'un commentaire */

var editComment = document.getElementById('editComment')
editComment.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget;
    var idEdit = button.getAttribute('data-bs-idEdit');
    var nicknameEdit = button.getAttribute('data-bs-nicknameEdit');
    var emailEdit = button.getAttribute('data-bs-emailEdit');
    var commentEdit = button.getAttribute('data-bs-commentEdit');
    var modalBody0Input = editComment.querySelector('.modal-body0 input');
    modalBody0Input.value = nicknameEdit;
    var modalBody1Input = editComment.querySelector('.modal-body1 input');
    modalBody1Input.value = emailEdit;
    var modalBody2Input = editComment.querySelector('.modal-body2 textarea');
    modalBody2Input.value = commentEdit;
    var modalBody2Input = editComment.querySelector('.modal-body3 input');
    modalBody2Input.value = idEdit;
})

/* Vérification de la conformité des deux champs mots de passe */

function checkPass() {
    'use strict';
    var champA = document.getElementById("editPassword1").value;
    var champB = document.getElementById("editPassword2").value;
    var div_comp = document.getElementById("divcomp");
    if (champA != '' && champB != '') {
        if (champA == champB) {
            divcomp.innerHTML = "";
            document.getElementById("btnValid").disabled = false;
        } else {
            divcomp.innerHTML = "<i>Les deux mots de passe doivent être identiques !</i>";
            divcomp.style.color = "red";
            document.getElementById("btnValid").disabled = true;
        }
    } else {
        divcomp.innerHTML = "<i>Le mot de passe ne doit pas être vide !</i>";
        divcomp.style.color = "red";
        document.getElementById("btnValid").disabled = true;
    }
}