$(function () {

    //Click and keyup event to send a research
    $('#research').keyup(function (e) {
        if (e.keyCode == 13) {
            search();

        }

    });

    $('#submitResearch').click(function () {
        console.log('entre');
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