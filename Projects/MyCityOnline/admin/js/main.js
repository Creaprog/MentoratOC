$(function () {

    function createElement(element1, element1Type, element2, element2Type, element3, type) {
        $('<p class="contact"><label for=' + element1 + '>' + element1 + ' : </label><input type=' + element1Type + ' name=' + element1 + ' id=' + element1 + '><br /><label for=' + element2 + '>' + element2 + ' : </label><input type=' + element2Type + ' name=' + element2 + ' id=' + element2 + '><br /><label for=' + element3 + '>' + element3 + ' :</label><textarea name=' + element3 + ' id=' + element3 + '></textarea><br /><input type="hidden" id="Type" value=' + type + '><button id="submit">Ajouter</button></p>').insertAfter('p');
    }

    function removeElement() {
        $('.contact').remove();
    }

    $('#addNew').click(function () {
        createElement('Titre', 'text', 'Image', 'text', 'Contenu', 'addNew');
    });

    $('#addInfo').click(function () {
        createElement('Titre', 'text', 'Image', 'text', 'Contenu', 'addInfo');
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
                    }
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