$(function () {

    /**
     * The genCore is the core of Form generator
     * @param element
     * To create element into the form generator you must call the genCore
     * Exemple: to add a creation label area in the generator:
     * genCore('label')
     * Exemple: to add label in the form:
     * genCore('insertLabel')
     */

    function genCore(element) {
        var valid = {
                'label': {value: 'label'},
                'text': {value: 'text'},
                'button': {value: 'button'},
                'insertLabel': {value: 'insertLabel'},
                'insertText': {value: 'insertText'},
                'insertButton': {value: 'insertButton'}
            },
            create = valid[element];

        if (!valid[element]) {
            throw Error('Element not valid. Must be one of "label", "text", "button", "insertLabel", "insertText" or "insertButton" .');
        }

        if (create.value == 'label') {
            $('#droite').append("<p class='label_creation'><label for='gen_label_area'>Texte du label </label><input type='text' id='gen_label_area' name='gen_label_area' /><button class='insert_label'>Ok</button></p>");
        } else if (create.value == 'text') {
            $('#droite').append("<p class='text_creation'><label for='gen_text_area'>id de la zone de texte </label><input type='text' id='gen_text_area' name='gen_text_area' /><button class='insert_text'>Ok</button></p>");
        } else if (create.value == 'button') {
            $('#droite').append("<p class='button_creation'><label for='gen_button_area'>Texte du button </label><input type='text' id='gen_button_area' name='gen_button_area' /><button class='insert_button'>Ok</button></p>");
        } else if (create.value == 'insertLabel') {
            var labelName = $('#gen_label_area').val();
            $('#gauche').append('<span>' + labelName + '</span>');
            $('.label_creation').remove();
        } else if (create.value == 'insertText') {
            var idName = $('#gen_text_area').val();
            $('#gauche').append('<input id=" ' + idName + '" type="text"><br /><br />');
            $('.text_creation').remove();
        } else {
            var buttonName = $('#gen_button_area').val();
            $('#gauche').append('<button>' + buttonName + '</button>');
            $('.button_creation').remove();
        }
    }

    $('#droite').append('<hr>').on("click", '.insert_label, .insert_text, .insert_button', function (event) {
        if (event.target.className === 'insert_label') {
            genCore('insertLabel');
        } else if (event.target.className === 'insert_text') {
            genCore('insertText');
        } else {
            genCore('insertButton');
        }
    });

    $('#gen_label').on("click", function () {
        genCore('label');
    });

    $('#gen_text').on("click", function () {
        genCore('text');
    });

    $('#gen_button').on("click", function () {
        genCore('button');
    });
});