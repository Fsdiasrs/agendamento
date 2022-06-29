<?php include("../config/config.php"); ?>
<?php \Classes\ClassLayout::setHeadRestrito("user"); ?>
<?php \Classes\ClassLayout::setHead('Grade de Horários','Selecione seu horário.',''); ?>
<?php \Classes\ClassLayout::setMenu(); ?>

<?php $date=new \DateTime($_GET['date'], new \DateTimeZone('America/Sao_Paulo'));?>
<div class="topFaixa float w100 center mb-3">
    Marcação de Consulta
</div>
<input class="float w100 h40" type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" required>
      <form name="formAdd" id="formAdd" method="post" action="<?php echo DIRPAGE.'controllers/ControllerAdd.php';?>">
        <div class="container">
            <div class="mb-3">
              <input type="text" name="title" id="title" class="form-control" placeholder="Nome" onkeyup="carregar_usuarios(this.value)">
            </div>
            <span id="resultado_pesquisa"></span>
            <div class="mb-3">
            <input type="hidden" name="id_usuario" id="id_usuario" class="form-control" required>
            </div>
            <div class="mb-3">
            <input type="text" name="description" id="description" class="form-control" placeholder="Sintomas" aria-describedby="helpId" required>
            </div>
            <div class="mb-3">
            <input type="date" name="date" id="date" class="form-control" value="<?php echo $date->format("Y-m-d"); ?>" required>
            </div>
            <div class="mb-3">
            <input type="time" name="time" id="time" class="form-control" value="<?php echo $date->format("H:m"); ?>" required>
            </div>
            <div class="mb-3">
            <select class="form-select" name="horasAtendimento" id="horasAtendimento" require>
              <option value="">Selecione</option>
              <option value="15">15 min</option>
              <option value="30">30 min</option>
              <option value="45">45 min</option>
              <option value="60">60 min</option>
            </select>
            </div>
            <button id="marcar" class="btn btn-primary" type="submit"><span class="icon">
                <ion-icon name="thumbs-up-outline"></ion-icon>
                </span>
                <span class           = "title">Marcar</span>
            </button>
        </div>
      </form>
    <script src='http://localhost/agendamento/lib/js/custom.js'></script>
<?php \Classes\ClassLayout::setFooter(); ?>