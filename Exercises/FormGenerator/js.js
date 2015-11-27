$(function(){
    function disable(){
        $(':button').css('opacity', '0.5').off();
    }

    function enable(){
        $(':button').css('opacity', '1').on();
    }

    $('#btn1')
        .on('click', disable)
        .click(function() {
        $('hr').after('<div id="conteneur">Texte du label <input type="text" id="tex"><button id="btnok">OK</button><br /><button id="btnCancel">Annuler</button></div>');
        /* Hide permet de voir le fadeIn */
        $('#conteneur').hide().fadeIn(1500, 'linear');
        $('#btnok').click(function(){
            var lid =  '<span>' + $('#tex').val() + '</span>';
            $('#gauche').append(lid);
            /* la fonction permet de voir le fadeOut et quand il est fini il supprime le conteneur */
            $('#conteneur').fadeOut(1500, 'linear', function(){
                $(this).remove();
            });
        });
        /* Code pour le bouton annuler on fait le fadeout et on supprime */
        $('#btnCancel').click(function(){
            /* la fonction permet de voir le fadeOut et quand il est fini il supprime le conteneur */
            $('#conteneur').fadeOut(1500, 'linear', function(){
                $(this).remove();
            });
        });
    });

    $('#btn2')
        .on('click', disable)
        .click(function(){
        $('hr').after('<div id="conteneur">id de la zone de texte <input type="text" id="tex"><button id="btnok">OK</button><br /><button id="btnCancel">Annuler</button></div>');
        /* Hide permet de voir le fadeIn */
        $('#conteneur').hide().fadeIn(1500, 'linear');
        $('#btnok').click(function(){
            var lid =  '<input type="text" id="' + $('#tex').val() + '"><br>';
            $('#gauche').append(lid);
            /* la fonction permet de voir le fadeOut et quand il est fini il supprime le conteneur */
            $('#conteneur').fadeOut(1500, 'linear', function(){
                $(this).remove();
            });
        });
        /* Code pour le bouton annuler on fait le fadeout et on supprime */
        $('#btnCancel').click(function(){
            /* la fonction permet de voir le fadeOut et quand il est fini il supprime le conteneur */
            $('#conteneur').fadeOut(1500, 'linear', function(){
                $(this).remove();
            });
        });
    });
    $('#btn3')
        .on('click', disable)
        .click(function(){
        $('hr').after('<div id="conteneur">Texte du bouton <input type="text" id="tex"><button id="btnok">OK</button><br /><button id="btnCancel">Annuler</button></div>');
        /* Hide permet de voir le fadeIn */
        $('#conteneur').hide().fadeIn(1500, 'linear');
        $('#btnok').click(function(){
            var lid =  '<button>' + $('#tex').val() + '</button>';
            $('#gauche').append(lid);
            /* la fonction permet de voir le fadeOut et quand il est fini il supprime le conteneur */
            $('#conteneur').fadeOut(1500, 'linear', function(){
                $(this).remove();
            });
        });
        /* Code pour le bouton annuler on fait le fadeout et on supprime */
        $('#btnCancel').click(function(){
            /* la fonction permet de voir le fadeOut et quand il est fini il supprime le conteneur */
            $('#conteneur').fadeOut(1500, 'linear', function(){
                $(this).remove();
            });
        });
    });
});