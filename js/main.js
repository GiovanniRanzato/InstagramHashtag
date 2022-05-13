// Quando la pagina è pronta
$(document).ready(function () {

    // Attivo Fancybox
    $('a[data-fancybox]').fancybox({
        loop: true,
        transitionEffect: "tube",
    });

    // Attivo l'animazione
    $('#start-animation').click(function (e) {
        e.preventDefault();
        $('#box').addClass('start');

        $('.galleria a').addClass('animated');
    });

});
