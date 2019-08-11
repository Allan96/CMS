$(document).ready(function() {
    var validator = $("#registroAjax").validate({
        rules: {
            username: {
                required: true,
                minlength: 3,
                remote: {
                    // var UserExiste = $("#username").val();
                    type: 'POST',
                    url: 'http://testes.yuup.online/loginAjax',
                    data: {
                        ValidaUser: function() {
                            return $("#username").val();
                        }
                    }
                }
            },
            password: {
                required: true,
                minlength: 6,
            },
            password_repeat: {
                required: true,
                minlength: 6,
            },
            email: {
                required: true,
                email: true,
            }

        },
        messages: {
            username: {
                required: 'Esse campo é obrigatório',
                minlength: "O nome deve ter pelo menos 3 caracteres",
                remote: "Esse usuário já existe",
            },
            password: {
                required: 'Esse campo é obrigatório',
                minlength: "Sua senha deve ter pelo menos 6 caracteres",
            },
            password_repeat: {
                required: 'Esse campo é obrigatório',
                minlength: "Sua senha deve ter pelo menos 6 caracteres",
            },
            email: {
                required: 'Esse campo é obrigatório',
                email: 'Insira um email válido',
            }
        }
    });
});