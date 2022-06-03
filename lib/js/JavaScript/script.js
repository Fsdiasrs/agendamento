//Retorno do root
function getRoot(){
    var root="http://"+document.location.hostname+"/";
    return root
}

function getCaptcha()
{
    grecaptcha.ready(function() {
        grecaptcha.execute('6Lds3TwgAAAAAKNQPC4xw0neFIBTlQxdV70gqZt5', {action: 'homepage'}).then(function(token) {
            const gRecaptchaResponse=document.querySelector("#g-recaptcha-response").value=token;
        });
    });
}
getCaptcha();

//Ajax do formulário de cadastro
$("#formCadastro").on("submit",function(evento){
    evento.preventDefault();
    var dados=$(this).serialize();

    $.ajax({
       url: getRoot()+'agendamento/controllers/controllerCadastro.php',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function (response) {
            $('.retornoCad').empty();
            if(response.retorno == 'erro'){
                getCaptcha();
                $.each(response.erros,function(key,value){
                    $('.retornoCad').append(value+'');
                });
            }else{
                $('.retornoCad').append('Dados inseridos com sucesso!');
            }
        }
    });
});

//Ajax do formulário de login
$("#formLogin").on("submit",function(event){
    event.preventDefault();
    var dados=$(this).serialize();

    $.ajax({
       url: getRoot()+'agendamento/controllers/controllerLogin.php',
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
                $.each(response.erros, function(key,value){
                    $('.resultadoForm').append(value+'<br>');
                });
            }
        }
    });
});

(function(win,doc){
    'use strict';

    //Exibir o calendário
    function getCalendar(perfil, div)
    {
        let calendarEl=doc.querySelector(div);
        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale:'pt-br',
            headerToolbar:{
            start: 'prev,next',
            center: 'title',
            end: 'today,listWeek'
        },
        buttonText:{
            today:    'hoje',
            month:    'mês',
            week:     'semana',
            day:      'dia'
        },
        footerToolbar:{
            start: '',
            center: 'dayGridMonth,timeGridWeek,timeGridDay',
            end: ''
        },
            droppable: true,
            editable:true,
            eventDrop:function(info){
                resizeAndDrop(info);
            },
            eventResize:function(info){
                resizeAndDrop(info);
            },
            dateClick: function(info) {
                if(perfil == 'manager'){
                    calendar.changeView('timeGrid', info.dateStr);
                }else{
                    if(info.view.type == 'dayGridMonth'){
                        calendar.changeView('timeGrid', info.dateStr);
                    }else{
                        win.location.href='/agendamento/views/user/add.php?date='+info.dateStr;
                    }
                }
            },
            events:  '/agendamento/controllers/ControllerEvents.php',
            eventClick: function(info) {
                if(perfil == 'manager'){
                    win.location.href=`/agendamento/views/manager/editar.php?id=${info.event.id}`;
                }
            }
        });
        calendar.render();
    }

    if(doc.querySelector('.calendarUser')){
        getCalendar('user','.calendarUser');
    }else if(doc.querySelector('.calendarManager')){
        getCalendar('manager','.calendarManager');
    }

    if(doc.querySelector('#delete')){
        let btn=doc.querySelector('#delete');
        btn.addEventListener('click',(event)=>{
            event.preventDefault();
            if(confirm("Deseja mesmo apagar este dado?")){
                win.location.href=event.target.parentNode.href;
            }
        },false);
    }

    //Arraste e redimensionamento de eventos
    async function resizeAndDrop(info){
        let newDate = new Date(info.event.start);
        let month = ((newDate.getMonth()+1)<9)?"0"+(newDate.getMonth()+1):newDate.getMonth()+1;
        let day = ((newDate.getDate())<9)?"0"+newDate.getDate():newDate.getDate();
        let minutes = ((newDate.getMinutes())<9)?"0"+newDate.getMinutes():newDate.getMinutes();
        newDate = `${newDate.getFullYear()}-${month}-${day} ${newDate.getHours()}:${minutes}:00`;

        let newDateEnd = new Date(info.event.end);
        let monthEnd = ((newDateEnd.getMonth()+1)<9)?"0"+(newDateEnd.getMonth()+1):newDateEnd.getMonth()+1;
        let dayEnd = ((newDateEnd.getDate())<9)?"0"+newDateEnd.getDate():newDateEnd.getDate();
        let minutesEnd = ((newDateEnd.getMinutes())<9)?"0"+newDateEnd.getMinutes():newDateEnd.getMinutes();
        newDateEnd = `${newDateEnd.getFullYear()}-${monthEnd}-${dayEnd} ${newDateEnd.getHours()}:${minutesEnd}:00`;

        let reqs = await fetch('http://localhost/agendamento/controllers/ControllerDrop.php', {
            method: 'post',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `id=${info.event.id}&start=${newDate}&end=${newDateEnd}`
        });
        let ress = await reqs.json();
    }
})(window,document);