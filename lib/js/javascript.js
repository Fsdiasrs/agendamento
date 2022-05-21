(function (win, doc) {
    'use strict';

    //Exibir o Calendário
    function getCalendar(perfil, div){
        let calendarEl                              = doc.querySelector('div');
        let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView                             : 'dayGridMonth',

        headerToolbar: {
            start                               : '',
            center                              : 'title',
            end                                 : ''
        },

        footerToolbar: {
            start                               : 'today',
            center                              : 'timeGridDay,dayGridMonth,timeGridWeek',
            end                                 : 'prev,next'
        },

        buttonText: {
            today                               : 'hoje',
            month                               : 'mês',
            week                                : 'semana',
            day                                 : 'dia'
        },

        dateClick: function(info) {
            if (perfil == 'manager') {
                alert("vai para a página do manager");
            }else{
                alert("vai para a página do user");
            }

            /*alert('Clicked on: ' + info.dateStr);
            alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
            alert('Current view: ' + info.view.type);*/
            
          },

        locale                                  : 'pt-br',

        events                                  : '/agendamento/controllers/ControllerEvents.php',

        eventClick: function(info) {
            if (perfil == 'manager') {
                win.location.href                   = `/views/manager/editar?id=${info.event.id}`;
            }
            
        }
    });
    calendar.render();
    }

    if (doc.querySelector('.calendarUser')) {
        getCalendar('user','calendarUser');
    } else if (doc.querySelector('.calendarManager')) {
        getCalendar('manager','calendarManager');
    }
})(window, document);