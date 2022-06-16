//Máscaras do formulário de cadastro
$('#cpf , #dataNascimento').on('focus', function () {
    var id=$(this).attr("id");
    if(id == "cpf"){VMasker(document.querySelector("#cpf")).maskPattern("999.999.999-99");}
    if(id == "dataNascimento"){VMasker(document.querySelector("#dataNascimento")).maskPattern("99/99/9999")};
});

//Retorno do Root
function getRoot(){
    var root="http://"+document.location.hostname+"/login/";
    return root;
}

function getCaptcha()
{
    grecaptcha.ready(function() {
        grecaptcha.execute('6LcJhWUgAAAAAJTZmKMq-xrGHZX7ufebE3tqgKpq', {action: 'homepage'}).then(function(token) {
            const gRecaptchaResponse=document.querySelector("#g-recaptcha-response").value=token;
        });
    });
}
getCaptcha();

//Ajax do formulário de cadastro
$("#formCadastro").on("submit",function(event){
    event.preventDefault();
    var dados=$(this).serialize();

    $.ajax({
       url: getRoot()+'controllers/controllerCadastro',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function (response) {
            if(response.retorno == 'success'){
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: 'Dados inseridos com sucesso!'
                  }).then(function() {
                    window.location = response.page;
                });
                $('.retornoCad').append('Dados inseridos com sucesso!');
                /* window.location.href=response.page; */
            }else{
            $('.retornoCad').empty();
            /* if(response.retorno == 'erro'){ */
                var erro = response.erros;
                getCaptcha();
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: erro
                  });
                $.each(response.erros,function(key,value){
                    $('.retornoCad').append(value+'');
                });
            }
        }
    });
});

//Ajax do formulário de login
$("#formLogin").on("submit",function(event){
    event.preventDefault();
    var dados=$(this).serialize();

    $.ajax({
       url: getRoot()+'controllers/controllerLogin',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function (response) {
            if (response.retorno == 'success') {
                window.location.href=response.page;
            } else {
                getCaptcha();
                if (response.tentativas == true) {
                    $('.loginFormulario').hide();
                }
                $('.resultadoForm').empty();
                $.each(response.erros, function(key, value){
                    $('.resultadoForm').append(value+'<br>');
                });
            }
        }
    });
});

//Ajax do formulário de confirmação de senha
$("#formSenha").on("submit",function(event){
    event.preventDefault();
    var dados=$(this).serialize();

    $.ajax({
        url: getRoot()+'controllers/controllerSenha',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function (response) {
            if(response.retorno == 'success'){
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: 'Redefinição de senha enviada com sucesso!'
                  }).then(function() {
                    window.location = response.page;
                });
                $('.retornoSen').html("Redefinição de senha enviada com sucesso!");
            }else{
                $('.retornoSen').empty();
                var erro = response.erros
                getCaptcha();
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: erro
                  });
                $.each(response.erros,function(key,value){
                    $('.retornoSen').append(value+'');
                });
            }
        }
    });
});

//CapsLock
$("#senha").keypress(function(e){
    kc=e.keyCode?e.keyCode:e.which;
    sk=e.shiftKey?e.shiftKey:((kc==16)?true:false);
    if(((kc>=65 && kc<=90) && !sk)||(kc>=97 && kc<=122)&&sk){
        $(".resultadoForm").html("Caps Lock Ligado");
    }else{
        $(".resultadoForm").empty();
    }
});