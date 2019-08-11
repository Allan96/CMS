$(document).ready(function() {
    $('.loginAjax').submit(function(e) {
        e.preventDefault();
        var Dados = $('.loginAjax').serialize();
        console.log(Dados);
        $.ajax({
            type: "POST",
            url: "http://testes.yuup.online/loginAjax",
            data: Dados,
            success: function(response) {
                $('.errorAjax').html(response);
            },
            error: function(response) {}
        });

    });

    // AVATAR INDEX
    $('.loginAjax #username').keyup(function() {
        var username = $('#username').val();
        if (username.length <= 1) {
            $('.avatar').html('');
            $('.avatar').css('background-image', 'url(templates/theme-yuup/assets/images/frank-head.png)');
        } else {
            $('.avatar').css('background-image', 'url()');
            $('.avatar').html('<img src="http://yuup.online/api/head/' + username + '" style="margin-top: -10px;margin-left: -5px;">');
        }
        console.log(username);

    });


});