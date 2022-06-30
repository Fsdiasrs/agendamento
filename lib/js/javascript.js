//Máscaras do formulário de cadastro
$('#cpf , #dataNascimento, #telefoneEmp, #telefoneResid, #celular').on('focus', function () {
  var id=$(this).attr("id");
  if(id == "cpf"){VMasker(document.querySelector("#cpf")).maskPattern("999.999.999-99");}
  if(id == "dataNascimento"){VMasker(document.querySelector("#dataNascimento")).maskPattern("99/99/9999")};
  if(id == "telefoneEmp"){VMasker(document.querySelector("#telefoneEmp")).maskPattern("(99)9999-9999")};
  if(id == "telefoneResid"){VMasker(document.querySelector("#telefoneResid")).maskPattern("(99)9999-9999")};
  if(id == "celular"){VMasker(document.querySelector("#celular")).maskPattern("(99)99999-9999")};
});

//Retorno do Root
function getRoot(){
  var root="http://"+document.location.hostname+"/agendamento/";
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
          console.log(response);
          $('.retornoCad').empty();
          if(response.retorno == 'erro'){
              getCaptcha();
              $.each(response.erros,function(key,value){
                  $('.retornoCad').append(value+'');
              });
          }else{
              Swal.fire(
                'Sucesso!',
                'Dados inseridos com sucesso!',
                'success'
              )
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



/* ---------------------------------------------Calendario---------------------------------------------------------------------------- */
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
          start: 'prev',
          center: 'title',
          end: 'next'
      },
      buttonText:{
          today:    'hoje',
          month:    'mês',
          week:     'semana',
          day:      'dia'
      },
      footerToolbar:{
          start: '',
          center: 'dayGridMonth,timeGridWeek,today',
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
                  if(info.view.type == 'dayGridMonth'){
                      calendar.changeView('timeGrid', info.dateStr);
                  }else{
                      win.location.href=getRoot()+'views/add.php?date='+info.dateStr;
                  }
              }else{
                  if(info.view.type == 'dayGridMonth'){
                      calendar.changeView('timeGrid', info.dateStr);
                  }else{
                      win.location.href=getRoot()+'views/add.php?date='+info.dateStr;
                  }
              }
          },
          events:  getRoot()+'controllers/controllerEvents.php',
          eventClick: function(info) {
              if(perfil == 'manager'){
                  win.location.href=getRoot()+`views/editar.php?id=${info.event.id}`;
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

if(doc.querySelector('#deleteCad')){
      let btn=doc.querySelector('#deleteCad');
      btn.addEventListener('click',(event)=>{
          event.preventDefault();
          Swal.fire({
            title: 'Tem certeza?',
            text: "Você não será capaz de reverter isso!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Deletar'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Excluído!',
                'O registro foi Excluído.',
                'success'
              ),
              win.location.href= getRoot()+'dadosPaciente';
            }
          })
      },false);
  }

  if(doc.querySelector('#delete')){
    let btn=doc.querySelector('#delete');
    btn.addEventListener('click',(event)=>{
        event.preventDefault();
        Swal.fire({
          title: 'Tem certeza?',
          text: "Você não será capaz de reverter isso!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Deletar'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              'Excluído!',
              'A consulta foi Excluída.',
              'success'
            ),
            win.location.href=event.target.parentNode.href;
          }
        })

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

      let reqs = await fetch(getRoot()+'controllers/ControllerDrop.php', {
          method: 'post',
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: `id=${info.event.id}&start=${newDate}&end=${newDateEnd}`
      });
      let ress = await reqs.json();
  }
})(window,document);

var search = document.getElementById("pesquisar");
search.addEventListener("keydown", function(event){
    if(event.key === "Enter"){
        searchData();
    }
});
function searchData() {
  window.location = getRoot() + "dadosPaciente?search=" + search.value;
}


