$(function () {

    $('#research').keyup(function (e) {
        if (e.keyCode == 13) {
            search();
        }
    });

    $('#submitResearch').click(function () {
        if ($('#research').val() != '') {
            search();
        }
    });

    function search() {
        var element = $('#research').val();
        $('#research').val("");
        document.location.href = "research.php?r=" + element;
    }
});