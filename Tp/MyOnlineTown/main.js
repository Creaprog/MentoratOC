$(function () {
    $('#newForm').hide();
    $('#infoForm').hide();
    $('#actForm').hide();
    $('#actList').hide();
    $('#newsList').hide();
    $('#infosList').hide();

    $('#addNew').click(function () {
        $('#addInfo').hide();
        $('#addAct').hide();
        $('#addNew').hide();
        $('#modAct').hide();
        $('#modNew').hide();
        $('#modInfo').hide();
        $('#newForm').fadeIn('slow');
    })

    $('#addInfo').click(function () {
        $('#addInfo').hide();
        $('#addAct').hide();
        $('#addNew').hide();
        $('#modAct').hide();
        $('#modNew').hide();
        $('#modInfo').hide();
        $('#infoForm').fadeIn('slow');
    })

    $('#addAct').click(function () {
        $('#addAct').hide();
        $('#addInfo').hide();
        $('#addNew').hide();
        $('#modAct').hide();
        $('#modNew').hide();
        $('#modInfo').hide();
        $('#actForm').fadeIn('slow');
    })

    $('#modAct').click(function () {
        $('#addInfo').hide();
        $('#addAct').hide();
        $('#addNew').hide();
        $('#modAct').hide();
        $('#modNew').hide();
        $('#modInfo').hide();
        $('#actList').fadeIn('slow');
    })

    $('#modNew').click(function () {
        $('#addInfo').hide();
        $('#addAct').hide();
        $('#addNew').hide();
        $('#modAct').hide();
        $('#modNew').hide();
        $('#modInfo').hide();
        $('#newsList').fadeIn('slow');
    })

    $('#modInfo').click(function () {
        $('#addInfo').hide();
        $('#addAct').hide();
        $('#addNew').hide();
        $('#modAct').hide();
        $('#modNew').hide();
        $('#modInfo').hide();
        $('#infosList').fadeIn('slow');
    })
});
