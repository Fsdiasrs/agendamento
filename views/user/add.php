<?php include("../../config/config.php"); ?>
<?php include(DIRREQ."lib/html/header.php"); ?>
<?php  
    $date=new \DateTime($_GET['date'], new \DateTimeZone('America/Sao_Paulo'));
?>

    <form name="formAdd" id="formAdd" method="post" action="<?php echo DIRPAGE.'controllers/ControllerAdd.php';?>">
       
        <div class                        = "mb-3-sm">
            <label for                    = "date" class="form-label-sm">Data:</label>
            <input type                   = "date" class="form-control-sm" name = "date" id="date" value="<?php echo $date->format("Y-m-d"); ?>" required>
        </div>

        <div class                        = "mb-3-sm">
            <label for                    = "time" class="form-label-sm">Hora:</label>
            <input type                   = "time" class="form-control-sm" name = "time" id="time" value="<?php echo $date->format("H:m"); ?>" required>
        </div>
        Paciente: <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="title" id="title"><br>
        Sintomas: <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="description" id="description"><br>
        Tempo de Atendimento:
        <select name="horasAtendimento" id="horasAtendimento" class="form-control form-control-sm">
            <option value="">Selecione</option>
            <option value="15">15 min</option>
            <option value="30">30 min</option>
            <option value="45">45 min</option>
        </select><br>
        <button class="btn btn-outline-primary" type="submit"><span class="icon">
            <ion-icon name="thumbs-up-outline"></ion-icon>
            </span>
            <span class           = "title">Marcar</span>
        </button>
    </form>
    </div>
<?php include(DIRREQ."lib/html/footer.php"); ?>