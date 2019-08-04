$('#noticias').flickity({
    cellAlign: 'left',
    contain: true,
    prevNextButtons: false,
    groupCells: true,
    pageDots: true,
    freeScroll: true,
    wrapAround: true
});
$('#hallmore').flickity({
    cellAlign: 'left',
    contain: true,
    prevNextButtons: true,
    groupCells: true,
    pageDots: false,
    freeScroll: true,
    wrapAround: true
});

$(document).ready(function() {
    $('.info-mais-div .close-icon').click(function(e) {
        e.preventDefault();
        $('.info-mais').removeClass('open');
        $(".info-mais-div").animate({
            right: "-300px",
        }, 1000, function() {
            // Animation complete.
        });

    });

    $('.info-mais').click(function(e) {
        e.preventDefault();
        var open = $('.info-mais').hasClass('open');
        if (!open) {
            $('.info-mais').addClass('open');
            $(".info-mais-div").animate({
                right: "0px",
            }, 1000, function() {
                // Animation complete.
            });
        } else {
            $('.info-mais').removeClass('open');
            $(".info-mais-div").animate({
                right: "-300px",
            }, 1000, function() {
                // Animation complete.
            });
        }

    });

    $('.redeflutuante').click(function(e) {
        e.preventDefault();
        var open = $('.redeflutuante').hasClass('open');
        if (!open) {
            $('.redeflutuante').addClass('open');
            $(".redeflutuante").animate({
                width: "8px",
            }, 1000, function() {
                // Animation complete.
            });

        } else {
            $('.redeflutuante').removeClass('open');
            $(".redeflutuante").animate({
                width: "300px",
            }, 1000, function() {
                // Animation complete.
            });
        }
    });

});