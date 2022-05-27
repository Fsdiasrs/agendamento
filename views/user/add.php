<?php include("../../config/config.php"); ?>
<?php include(DIRREQ."lib/html/header.php"); ?>
<?php  
    $date=new \DateTime($_GET['date'], new \DateTimeZone('America/Sao_Paulo'));
?>

    <form name="formAdd" id="formAdd" method="post" action="<?php echo DIRPAGE.'controllers/ControllerAdd.php';?>">

        <div class="form-group">
          <label for="title">Paciente</label>
          <input type="text" name="title" id="title" class="form-control" placeholder="Informe o nome" aria-describedby="helpId">
          <small id="helpId" class="text-muted">Nome</small>
        </div>

        <div class="form-group">
          <label for="description">Sintomas</label>
          <input type="text" name="description" id="description" class="form-control" placeholder="Descreva os sintomas" aria-describedby="helpId">
          <small id="helpId" class="text-muted">Descrição</small>
        </div>

        <div class="form-group">
          <label for="date">Data</label>
          <input type="date" name="date" id="date" class="form-control" value="<?php echo $date->format("Y-m-d"); ?>" required>
          <small id="helpId" class="text-muted">Data da consulta</small>
        </div>                          

        <div class="form-group">
          <label for="time">Hora</label>
          <input type="time" name="time" id="time" class="form-control" value="<?php echo $date->format("H:m"); ?>" required>
          <small id="helpId" class="text-muted">Horário da consulta</small>
        </div>

        <div class="form-group">
          <label for="">Tempo de Atendimento</label>
          <select class="form-control form-control-sm" name="horasAtendimento" id="horasAtendimento">
            <option value="">Selecione</option>
            <option value="15">15 min</option>
            <option value="30">30 min</option>
            <option value="45">45 min</option>
          </select>
        </div>
        <br>
        <div class="botao">
            <button class="btn btn-outline-primary" type="submit"><span class="icon">
                <ion-icon name="thumbs-up-outline"></ion-icon>
                </span>
                <span class           = "title">Marcar</span>
            </button>
        </div>
        
    </form>
    </div>
<?php include(DIRREQ."lib/html/footer.php"); ?>