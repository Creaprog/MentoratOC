$(function () {
    //Function to create form
    function createElement(element1, element1Text, element1Type, element2, element2Text, element2Type, element3, element3Text, type, id) {
        $('<from class="contact"><div class="form-group"><label for=' + element1 + '>' + element1Text + ' : </label><input type=' + element1Type + ' name=' + element1 + ' id=' + element1 + ' class="form-control" required></div><div class="form-group"><label for=' + element2 + '>' + element2Text + ' : </label><input type=' + element2Type + ' name=' + element2 + ' id=' + element2 + ' class="form-control" required></div><div class="form-group"><label for=' + element3 + '>' + element3Text + ' :</label><textarea name=' + element3 + ' id=' + element3 + ' rows="10" cols="40" class="form-control" required></textarea></div><input type="hidden" id="Type" value=' + type + '><input type="hidden" id="Id" value=' + id + '><button class="btn btn-success" id="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Enregistrer</button></from>').insertAfter('p');
    }

    //Function to create a back button
    function createReturn() {
        $('<button class="btn btn-primary" id="return"><span class="glyphicon glyphicon-menu-left"></span> Retour</button>').insertAfter('#addAct');
    }

    //Function to remove form
    function removeElement() {
        $('.contact').remove();
    }

    //Function to show all buttons
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

    //Function to hide all buttons
    function hide_all() {
        $('#addInfo').hide();
        $('#addAct').hide();
        $('#addNew').hide();
        $('#getNews').hide();
        $('#getInfos').hide();
        $('#getAct').hide();
        $('#getPub').hide();
    }

    //Function to empty log message
    function removeLog() {
        $('#dataLog').empty();
    }

    //Function to empty thead an tbody of table
    function remove_Recept() {
        $('thead').empty();
        $('tbody').empty();
    }

    //Object to get account statut
    var checkAccess = $.ajax({
        method: 'GET',
        url: 'statut.php'
    });

    //Function to load table by ajax request
    function loadRecept($element) {
        switch ($element) {
            case 'News':
                $element = 'news';
                $('thead').append('<tr><th>Titre</th><th>Image</th><th>Contenu</th><th>Statut</th><th>Action</th></tr>');
                break;
            case 'Informations':
                $element = 'informations';
                $('thead').append('<tr><th>Titre</th><th>Image</th><th>Contenu</th><th>Statut</th><th>Action</th></tr>');
                break;
            case 'Activities':
                $element = 'activities';
                $('thead').append('<tr><th>Date</th><th>Titre</th><th>Description</th><th>Statut</th><th>Action</th></tr>');
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
                var statut, acces = false;
                checkAccess.done(function (data) {
                    if (data == 2) {
                        acces = true;
                    } else {
                        acces = false;
                    }
                });
                switch ($element) {
                    case 'news':
                        for (var news in elementParsed) {
                            statut = elementParsed[news]['publish'];
                            if (statut != 1) {
                                statut = 'Non publié';
                            } else {
                                statut = 'Publié';
                            }
                            if (acces == false) {
                                $('tbody').append('<tr><td data-thead="Titre :">' + elementParsed[news]['title'].substr(0, 16) + '</td><td data-thead="Image :">' + elementParsed[news]['image'].substr(0, 20) + '</td><td data-thead="Contenu :">' + elementParsed[news]['content'].substr(0, 50) + '</td><td data-thead="Statut :">' + statut + '</td><td><button class="modNew btn btn-warning" data-id=' + elementParsed[news]['id'] + '><span class="glyphicon glyphicon-pencil"></span> Modifier</button></td></tr>');
                            } else {
                                $('tbody').append('<tr><td data-thead="Titre :">' + elementParsed[news]['title'].substr(0, 16) + '</td><td data-thead="Image :">' + elementParsed[news]['image'].substr(0, 20) + '</td><td data-thead="Contenu :">' + elementParsed[news]['content'].substr(0, 50) + '</td><td data-thead="Statut :">' + statut + '</td><td><button class="modNew btn btn-warning" data-id=' + elementParsed[news]['id'] + '><span class="glyphicon glyphicon-pencil"></span> Modifier</button><button class="del btn btn-danger" data-id=' + elementParsed[news]['id'] + ' data-type="new"><span class="glyphicon glyphicon-remove"></span> Supprimer</button></td></tr>');
                            }
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
                            if (acces == false) {
                                $('tbody').append('<tr><td data-thead="Titre :">' + elementParsed[informations]['title'].substr(0, 16) + '</td><td data-thead="Image :">' + elementParsed[informations]['image'].substr(0, 20) + '</td><td data-thead="Contenu :">' + elementParsed[informations]['content'].substr(0, 50) + '</td><td data-thead="Statut :">' + statut + '</td><td><button class="modInfo btn btn-warning" data-id=' + elementParsed[informations]['id'] + '><span class="glyphicon glyphicon-pencil"></span> Modifier</button></td></tr>');
                            } else {
                                $('tbody').append('<tr><td data-thead="Titre :">' + elementParsed[informations]['title'].substr(0, 16) + '</td><td data-thead="Image :">' + elementParsed[informations]['image'].substr(0, 20) + '</td><td data-thead="Contenu :">' + elementParsed[informations]['content'].substr(0, 50) + '</td><td data-thead="Statut :">' + statut + '</td><td><button class="modInfo btn btn-warning" data-id=' + elementParsed[informations]['id'] + '><span class="glyphicon glyphicon-pencil"></span> Modifier</button><button class="del btn btn-danger" data-id=' + elementParsed[informations]['id'] + ' data-type="information"><span class="glyphicon glyphicon-remove"></span> Supprimer</button></td></tr>');
                            }
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
                            if (acces == false) {
                                $('tbody').append('<tr><td data-thead="Titre :">' + new Date(instant).toLocaleDateString() + '</td><td data-thead="Image :">' + elementParsed[activities]['title'].substr(0, 16) + '</td><td data-thead="Contenu :">' + elementParsed[activities]['description'].substr(0, 50) + '</td><td data-thead="Statut :">' + statut + '</td><td><button class="modAct btn btn-warning" data-id=' + elementParsed[activities]['id'] + '><span class="glyphicon glyphicon-pencil"></span> Modifier</button></td></tr>');
                            } else {
                                $('tbody').append('<tr><td data-thead="Titre :">' + new Date(instant).toLocaleDateString() + '</td><td data-thead="Image :">' + elementParsed[activities]['title'].substr(0, 16) + '</td><td data-thead="Contenu :">' + elementParsed[activities]['description'].substr(0, 50) + '</td><td data-thead="Statut :">' + statut + '</td><td><button class="modAct btn btn-warning" data-id=' + elementParsed[activities]['id'] + '><span class="glyphicon glyphicon-pencil"></span> Modifier</button><button class="del btn btn-danger" data-id=' + elementParsed[activities]['id'] + ' data-type="activitee"><span class="glyphicon glyphicon-remove"></span> Supprimer</button></td></tr>');
                            }
                        }
                        break;
                    case 'pub':
                        for (var pub in elementParsed) {
                            for (var i = 0; i < elementParsed[pub].length; i++) {
                                $('tbody').append('<tr><td data-thead="Type :">' + elementParsed[pub][i].Type + '</td><td data-thead="Titre :">' + elementParsed[pub][i].title + '</td><td data-thead="Action :"><button class="pubElem btn btn-success" data-id=' + elementParsed[pub][i].id + ' data-type=' + elementParsed[pub][i].Type + '><span class="glyphicon glyphicon-eye-open"></span> Publier</button></td><td></td></tr>');
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

    //Function to list all element by ajax request
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

    //Area to click event of all buttons
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
                            $('#dataLog').html('<div class="alert alert-success" role="alert">' +
                                'La news a bien été ajouté !</div>');
                            break;
                        case 'addInfo':
                            $('#dataLog').html('<div class="alert alert-success" role="alert">' +
                                'L\'information a bien été ajouté !</div>');
                            break;
                        case 'addAct':
                            $('#dataLog').html('<div class="alert alert-success" role="alert">' +
                                'L\'activité a bien été ajouté !</div>');
                            break;
                        case 'modNew':
                            $('#dataLog').html('<div class="alert alert-success" role="alert">' +
                                'La news a bien été modifé !</div>');
                            break;
                        case 'modInfo':
                            $('#dataLog').html('<div class="alert alert-success" role="alert">' +
                                'L\'information a bien été modifé !</div>');
                            break;
                        case 'modAct':
                            $('#dataLog').html('<div class="alert alert-success" role="alert">' +
                                'L\'activité a bien été modifé !</div>');
                            break;
                    }
                    show_all();
                } else {
                    $('#dataLog').html('<div class="alert alert-danger" role="alert">' + data + '</div>');
                }
            },
            error: function () {
                alert('La requête n\'a pas abouti');
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
            data: {update: 'ok', type: type, id: id},
            timeout: 3000,
            success: function (data) {
                if (data === 'requestOk') {
                    $('#dataLog').html('<div class="alert alert-success" role="alert">' +
                        'L\'élément a bien été publié !</div>');
                    $('.contact').remove();
                    remove_Recept();
                    show_all();
                }
            },
            error: function () {
                alert('La requête n\'a pas abouti');
            }
        });

    });

    $(document).on('click', '.del', function () {
        var type = $(this).attr('data-type');
        var id = $(this).attr('data-id');

        $.ajax({
            type: 'POST',
            url: 'ajax/request.php',
            data: {delete: 'ok', type: type, id: id},
            timeout: 3000,
            success: function (data) {
                if (data === 'requestOk') {
                    $('#dataLog').html('<div class="alert alert-success" role="alert">' +
                        'L\'élément a bien été supprimé !</div>');
                    $('.contact').remove();
                    remove_Recept();
                    show_all();
                }
            },
            error: function () {
                alert('La requête n\'a pas abouti');
            }
        });
    })

});