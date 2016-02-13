$(function () {

    function createElement(element1, element1Text, element1Type, element2, element2Text, element2Type, element3, element3Text, type) {
        $('<p class="contact"><label for=' + element1 + '>' + element1Text + ' : </label><input type=' + element1Type + ' name=' + element1 + ' id=' + element1 + '><br /><label for=' + element2 + '>' + element2Text + ' : </label><input type=' + element2Type + ' name=' + element2 + ' id=' + element2 + '><br /><label for=' + element3 + '>' + element3Text + ' :</label><textarea name=' + element3 + ' id=' + element3 + '></textarea><br /><input type="hidden" id="Type" value=' + type + '><button id="submit">Ajouter</button></p>').insertAfter('p');
    }

    function removeElement() {
        $('.contact').remove();
    }

    function show_all() {
        $('#addInfo').show();
        $('#addAct').show();
        $('#addNew').show();
    }

    function removeLog() {
        $('#dataLog').empty();
    }

    $('#addNew').click(function () {
        $(this).hide();
        $('#addInfo').hide();
        $('#addAct').hide();
        removeLog();
        createElement('Titre', 'Titre', 'text', 'Image', 'Image', 'text', 'Contenu', 'Contenu', 'addNew');
        $('.contact').hide().fadeIn("slow");
    });

    $('#addInfo').click(function () {
        $(this).hide();
        $('#addAct').hide();
        $('#addNew').hide();
        removeLog();
        createElement('Titre', 'Titre', 'text', 'Image', 'Image', 'text', 'Contenu', 'Contenu', 'addInfo');
        $('.contact').hide().fadeIn("slow");
    });

    $('#addAct').click(function () {
        $(this).hide();
        $('#addNew').hide();
        $('#addInfo').hide();
        removeLog();
        createElement('Titre', 'Date', 'date', 'Image', 'Titre', 'text', 'Contenu', 'Description', 'addAct');
        $('.contact').hide().fadeIn("slow");
    });

    $(document).on('click', '#submit', function () {
        var Titre = $('#Titre').val();
        var Image = $('#Image').val();
        var Contenu = $('#Contenu').val();
        var Type = $('#Type').val();

        $.ajax({
            type: 'POST',
            url: 'ajax/request.php',
            data: {title: Titre, image: Image, content: Contenu, type: Type},
            timeout: 3000,
            success: function (data) {
                if (data === 'requestOk') {
                    removeElement();
                    switch (Type) {
                        case 'addNew':
                            $('#dataLog').html('La new a bien été ajouté !');
                            break;
                        case 'addInfo':
                            $('#dataLog').html('L\'information a bien été ajouté !');
                            break;
                        case 'addAct':
                            $('#dataLog').html('L\'actualité a bien été ajouté !');
                            break;
                    }
                    show_all();
                } else {
                    $('#dataLog').html(data);
                }
            },
            error: function () {
                alert('La requete n\'a pas abouti');
            }
        });

    });


});