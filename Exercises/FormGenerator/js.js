$(function () {
    /* selection de tout les boutons */
    var button = $(':button');
    $('#btn1')
        .click(function () {
            /* si le bouton n'est pas desactiver  */
            if (button.attr('class') != 'hidden') {
                /* On le desactive */
                button.attr('class', 'hidden');
                $('hr').after('<div id="conteneur">Texte du label <input type="text" id="tex"><button id="btnok">OK</button><br /><button id="btnCancel">Annuler</button></div>');
                /* Hide permet de voir le fadeIn */
                $('#conteneur').hide().fadeIn(1500, 'linear');
                $('#btnok')
                    .click(function () {
                        /* si les boutons sont bien desactiver  */
                        if (button.attr('class') == 'hidden') {
                            /* on les active */
                            button.removeAttr('class', 'hidden');
                            var lid = '<span>' + $('#tex').val() + '</span>';
                            $('#gauche').append(lid);
                            /* la fonction permet de voir le fadeOut et quand il est fini il supprime le conteneur */
                            $('#conteneur').fadeOut(1500, 'linear', function () {
                                $(this).remove();
                            });
                        }

                    });
                /* Code pour le bouton annuler on fait le fadeout et on supprime */
                $('#btnCancel').click(function () {
                    button.removeAttr('class', 'hidden');
                    /* la fonction permet de voir le fadeOut et quand il est fini il supprime le conteneur */
                    $('#conteneur').fadeOut(1500, 'linear', function () {
                        $(this).remove();
                    });
                });
            }
        });

    $('#btn2')
        .click(function () {
            /* si le bouton n'est pas desactiver  */
            if (button.attr('class') != 'hidden') {
                /* On le desactive */
                button.attr('class', 'hidden');
                $('hr').after('<div id="conteneur">id de la zone de texte <input type="text" id="tex"><button id="btnok">OK</button><br /><button id="btnCancel">Annuler</button></div>');
                /* Hide permet de voir le fadeIn */
                $('#conteneur').hide().fadeIn(1500, 'linear');
                $('#btnok').click(function () {
                    /* si les boutons sont bien desactiver  */
                    if (button.attr('class') == 'hidden') {
                        /* on les active */
                        button.removeAttr('class', 'hidden');
                        var lid = '<input type="text" id="' + $('#tex').val() + '"><br>';
                        $('#gauche').append(lid);
                        /* la fonction permet de voir le fadeOut et quand il est fini il supprime le conteneur */
                        $('#conteneur').fadeOut(1500, 'linear', function () {
                            $(this).remove();
                        });
                    }
                });
                /* Code pour le bouton annuler on fait le fadeout et on supprime */
                $('#btnCancel').click(function () {
                    button.removeAttr('class', 'hidden');
                    /* la fonction permet de voir le fadeOut et quand il est fini il supprime le conteneur */
                    $('#conteneur').fadeOut(1500, 'linear', function () {
                        $(this).remove();
                    });
                });
            }

        });

    $('#btn3')
        .click(function () {
            /* si le bouton n'est pas desactiver  */
            if (button.attr('class') != 'hidden') {
                /* On le desactive */
                button.attr('class', 'hidden');
                $('hr').after('<div id="conteneur">Texte du bouton <input type="text" id="tex"><button id="btnok">OK</button><br /><button id="btnCancel">Annuler</button></div>');
                /* Hide permet de voir le fadeIn */
                $('#conteneur').hide().fadeIn(1500, 'linear');
                $('#btnok').click(function () {
                    /* si les boutons sont bien desactiver  */
                    if (button.attr('class') == 'hidden') {
                        /* on les active */
                        button.removeAttr('class', 'hidden');
                        var lid = '<button>' + $('#tex').val() + '</button>';
                        $('#gauche').append(lid);
                        /* la fonction permet de voir le fadeOut et quand il est fini il supprime le conteneur */
                        $('#conteneur').fadeOut(1500, 'linear', function () {
                            $(this).remove();
                        });
                    }

                });
                /* Code pour le bouton annuler on fait le fadeout et on supprime */
                $('#btnCancel').click(function () {
                    button.removeAttr('class', 'hidden');
                    /* la fonction permet de voir le fadeOut et quand il est fini il supprime le conteneur */
                    $('#conteneur').fadeOut(1500, 'linear', function () {
                        $(this).remove();
                    });
                });
            }

        });
});