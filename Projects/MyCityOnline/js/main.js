$(function () {
    function createElement(element1, element1Text, element1Type, element2, element2Text, element2Type, element3, element3Text, type, id) {
        $('<p class="contact"><label for=' + element1 + '>' + element1Text + ' : </label><input type=' + element1Type + ' name=' + element1 + ' id=' + element1 + '><br /><label for=' + element2 + '>' + element2Text + ' : </label><input type=' + element2Type + ' name=' + element2 + ' id=' + element2 + '><br /><label for=' + element3 + '>' + element3Text + ' :</label><textarea name=' + element3 + ' id=' + element3 + '></textarea><br /><input type="hidden" id="Type" value=' + type + '><input type="hidden" id="Id" value=' + id + '><button id="submit">Enregistrer</button></p>').insertAfter('p');
    }

    function createReturn() {
        $('<button id="return">Retour</button>').insertAfter('#addAct');
    }

    function removeElement() {
        $('.contact').remove();
    }

    function show_all() {
        $('#addInfo').fadeIn('slow');
        $('#addAct').fadeIn('slow');
        $('#addNew').fadeIn('slow');
        $('#getNews').fadeIn('slow');
        $('#getInfos').fadeIn('slow');
        $('#getAct').fadeIn('slow');
        $('#getPub').fadeIn('slow');
        $('#return').hide();
    }

    function hide_all() {
        $('#addInfo').hide();
        $('#addAct').hide();
        $('#addNew').hide();
        $('#getNews').hide();
        $('#getInfos').hide();
        $('#getAct').hide();
        $('#getPub').hide();
    }

    function removeLog() {
        $('#dataLog').empty();
    }

    function remove_Recept() {
        $('thead').empty();
        $('tbody').empty();
    }

    function loadRecept($element) {
        switch ($element) {
            case 'News':
                $element = 'news';
                $('thead').append('<tr><th>Titre</th><th>Image</th><th>Contenu</th><th>Statut</th></tr>');
                break;
            case 'Informations':
                $element = 'informations';
                $('thead').append('<tr><th>Titre</th><th>Image</th><th>Contenu</th><th>Statut</th></tr>');
                break;
            case 'Activities':
                $element = 'activities';
                $('thead').append('<tr><th>Date</th><th>Titre</th><th>Description</th><th>Statut</th></tr>');
                break;
            case 'pub':
                $element = 'pub';
                $('thead').append('<tr><th>Type</th><th>Titre</th><th>Action</th></tr>');
                break;
        }
        $.ajax({
            type: 'POST',
            url: 'ajax/request.php',
            data: {getElement: $element},
            timeout: 3000,
            success: function (data) {
                var elementParsed = jQuery.parseJSON(data);
                var statut;
                switch ($element) {
                    case 'news':
                        for (var news in elementParsed) {
                            statut = elementParsed[news]['publish'];
                            if (statut != 1) {
                                statut = 'Non publié';
                            } else {
                                statut = 'Publié';
                            }
                            $('tbody').append('<tr><td data-thead="Titre :">' + elementParsed[news]['title'] + '</td><td data-thead="Image :">' + elementParsed[news]['image'] + '</td><td data-thead="Contenu :">' + elementParsed[news]['content'] + '</td><td>' + statut + '</td><td><button class="modNew" data-id=' + elementParsed[news]['id'] + '>Modifier</button></td></tr>');
                        }
                        break;
                    case 'informations':
                        for (var informations in elementParsed) {
                            statut = elementParsed[informations]['publish'];
                            if (statut != 1) {
                                statut = 'Non publié';
                            } else {
                                statut = 'Publié';
                            }
                            $('tbody').append('<tr><td data-thead="Titre :">' + elementParsed[informations]['title'] + '</td><td data-thead="Image :">' + elementParsed[informations]['image'] + '</td><td data-thead="Contenu :">' + elementParsed[informations]['content'] + '</td><td>' + statut + '</td><td><button class="modInfo" data-id=' + elementParsed[informations]['id'] + '>Modifier</button></td></tr>');
                        }
                        break;
                    case 'activities':
                        for (var activities in elementParsed) {
                            statut = elementParsed[activities]['publish'];
                            if (statut != 1) {
                                statut = 'Non publié';
                            } else {
                                statut = 'Publié';
                            }
                            var instant = elementParsed[activities]['instant'].replace(new RegExp('-', 'g'), ',');
                            $('tbody').append('<tr><td data-thead="Titre :">' + new Date(instant).toLocaleDateString() + '</td><td data-thead="Image :">' + elementParsed[activities]['title'] + '</td><td data-thead="Contenu :">' + elementParsed[activities]['description'] + '</td><td>' + statut + '</td><td><button class="modAct" data-id=' + elementParsed[activities]['id'] + '>Modifier</button></td></tr>');
                        }
                        break;
                    case 'pub':
                        for (var pub in elementParsed) {
                            for (var i = 0; i < elementParsed[pub].length; i++) {
                                $('tbody').append('<tr><td data-thead="Type :">' + elementParsed[pub][i].Type + '</td><td data-thead="Titre :">' + elementParsed[pub][i].title + '</td><td data-thead="Action :"><button class="pubElem" data-id=' + elementParsed[pub][i].id + ' data-type=' + elementParsed[pub][i].Type + '>Publier</button></td><td></td></tr>');
                            }
                        }
                        break;
                }

            },
            error: function () {
                alert('La requete n\'a pas abouti');
            }
        });
    }

    function loadElement($element, $idElement) {
        switch ($element) {
            case 'New':
                $element = 'new';
                break;
            case 'Info':
                $element = 'information';
                break;
            case 'Act':
                $element = 'activitie';
                break;
        }

        $.ajax({
            type: 'POST',
            url: 'ajax/request.php',
            data: {modElement: $element, idElement: $idElement},
            timeout: 3000,
            success: function (data) {
                var elementParsed = jQuery.parseJSON(data);
                switch ($element) {
                    case 'new':
                        $('#Titre').val(elementParsed['title']);
                        $('#Image').val(elementParsed['image']);
                        $('#Contenu').val(elementParsed['content']);
                        break;
                    case 'information':
                        $('#Titre').val(elementParsed['title']);
                        $('#Image').val(elementParsed['image']);
                        $('#Contenu').val(elementParsed['content']);
                        break;
                    case 'activitie':
                        $('#Titre').val(elementParsed['instant']);
                        $('#Image').val(elementParsed['title']);
                        $('#Contenu').val(elementParsed['description']);
                        break;
                }
            },
            error: function () {
                alert('La requete n\'a pas abouti');
            }
        });
    }

    $('#addNew').click(function () {
        hide_all();
        removeLog();
        createElement('Titre', 'Titre', 'text', 'Image', 'Image', 'text', 'Contenu', 'Contenu', 'addNew', '');
        $('.contact').hide().fadeIn("slow");
        createReturn();
    });

    $('#addInfo').click(function () {
        hide_all();
        removeLog();
        createElement('Titre', 'Titre', 'text', 'Image', 'Image', 'text', 'Contenu', 'Contenu', 'addInfo', '');
        $('.contact').hide().fadeIn("slow");
        createReturn();
    });

    $('#addAct').click(function () {
        hide_all();
        removeLog();
        createElement('Titre', 'Date', 'date', 'Image', 'Titre', 'text', 'Contenu', 'Description', 'addAct', '');
        $('.contact').hide().fadeIn("slow");
        createReturn();
    });

    $('#getNews').click(function () {
        hide_all();
        removeLog();
        loadRecept('News');
        createReturn();
    });

    $('#getInfos').click(function () {
        hide_all();
        removeLog();
        loadRecept('Informations');
        createReturn();
    });

    $('#getAct').click(function () {
        hide_all();
        removeLog();
        loadRecept('Activities');
        createReturn();
    });

    $('#getPub').click(function () {
        hide_all();
        removeLog();
        loadRecept('pub');
        createReturn();
    });


    $(document).on('click', '#submit', function () {
        var Titre = $('#Titre').val();
        var Image = $('#Image').val();
        var Contenu = $('#Contenu').val();
        var Type = $('#Type').val();
        var Id = $('#Id').val();

        $.ajax({
            type: 'POST',
            url: 'ajax/request.php',
            data: {title: Titre, image: Image, content: Contenu, type: Type, id: Id},
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
                        case 'modNew':
                            $('#dataLog').html('La new a bien été modifée !');
                            break;
                        case 'modInfo':
                            $('#dataLog').html('L\'information a bien été modifée !');
                            break;
                        case 'modAct':
                            $('#dataLog').html('L\'actualitée a bien été modifée !');
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

    $(document).on('click', '#return', function () {
        $('.contact').remove();
        remove_Recept();
        show_all();
        $('#return').remove();
    });

    $(document).on('click', '.modNew', function () {
        var id = $(this).attr('data-id');
        remove_Recept();
        createElement('Titre', 'Titre', 'text', 'Image', 'Image', 'text', 'Contenu', 'Contenu', 'modNew', id);
        loadElement('New', id);
    });

    $(document).on('click', '.modInfo', function () {
        var id = $(this).attr('data-id');
        remove_Recept();
        createElement('Titre', 'Titre', 'text', 'Image', 'Image', 'text', 'Contenu', 'Contenu', 'modInfo', id);
        loadElement('Info', id);
    });

    $(document).on('click', '.modAct', function () {
        var id = $(this).attr('data-id');
        remove_Recept();
        createElement('Titre', 'Date', 'date', 'Image', 'Titre', 'text', 'Contenu', 'Description', 'modAct', id);
        loadElement('Act', id);
    });

    $(document).on('click', '.pubElem', function () {
        var type = $(this).attr('data-type');
        var id = $(this).attr('data-id');

        $.ajax({
            type: 'POST',
            url: 'ajax/request.php',
            data: {type: type, id: id},
            timeout: 3000,
            success: function (data) {
                if (data === 'requestOk') {
                    $('#dataLog').html('L\'article à bien été publier !');
                    $('.contact').remove();
                    remove_Recept();
                    show_all();
                }
            },
            error: function () {
                alert('La requete n\'a pas abouti');
                console.log('off');
            }
        });

    });

});