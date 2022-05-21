(function (win, doc) {
    'use strict';

    let calendarEl = doc.querySelector('.calendar');
    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',

        headerToolbar: {
            start: '',
            center: 'title',
            end: ''
        },

        footerToolbar: {
            start: 'today',
            center: 'timeGridDay,dayGridMonth,timeGridWeek',
            end: 'prev,next'
        },
        buttonText: {
            today: 'hoje',
            month: 'mês',
            week: 'semana',
            day: 'dia'
        },
        dateClick: function(info) {
            alert('Clicked on: ' + info.dateStr);
            alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
            alert('Current view: ' + info.view.type);
            // change the day's background color just for fun
            info.dayEl.style.backgroundColor = 'red';
          },
        locale: 'pt-br',
        events: '/agendamento/lib/js/events.json',
        eventClick: function(info) {
            win.location.href=`https://www.sitequalquer.com.br/evento/${info.event.id}`
        }
    });
    calendar.render();



})(window, document);