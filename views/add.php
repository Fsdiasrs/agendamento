<?php include("../config/config.php"); ?>
<?php \Classes\ClassLayout::setHeadRestrito("manager"); ?>
<?php \Classes\ClassLayout::setHead('Grade de Horários','Selecione seu horário.',''); ?>

<?php $date=new \DateTime($_GET['date'], new \DateTimeZone('America/Sao_Paulo'));?>
<div class="topFaixa float w100 center">
    Marcação de Consulta
</div>
<input class="float w100 h40" type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" required>
      <form name="formAdd" id="formAdd" method="post" action="<?php echo DIRPAGE.'controllers/ControllerAdd.php';?>">
        <div class="container-sm">
            <input type="text" name="title" id="title" class="form-control" placeholder="Informe seu nome" aria-describedby="helpId">
            <input type="text" name="description" id="description" class="form-control" placeholder="Sintomas" aria-describedby="helpId">
            <input type="date" name="date" id="date" class="form-control" value="<?php echo $date->format("Y-m-d"); ?>" required>
            <input type="time" name="time" id="time" class="form-control" value="<?php echo $date->format("H:m"); ?>" required>
            <select class="form-select" name="horasAtendimento" id="horasAtendimento">
              <option value="">Selecione</option>
              <option value="15">15 min</option>
              <option value="30">30 min</option>
              <option value="45">45 min</option>
              <option value="60">60 min</option>
            </select>
            <br>
            <div class="botao">
                <button class="btn btn-outline-primary" type="submit"><span class="icon">
                    <ion-icon name="thumbs-up-outline"></ion-icon>
                    </span>
                    <span class           = "title">Marcar</span>
                </button>
            </div>
        </div>
      </form>

<?php \Classes\ClassLayout::setFooter(); ?>