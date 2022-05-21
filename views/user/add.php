<?php include("../../config/config.php"); ?>
<?php include(DIRREQ."lib/html/header.php"); ?>
<?php  
    $date=new \DateTime($_GET['date'], new \DateTimeZone('America/Sao_Paulo'));
?>
    <form name="formAdd" id="formAdd" method="post" action="<?php echo DIRPAGE.'controllers/ControllerAdd.php';?>">
        Data: <input type="date" name="date" id="date" value="<?php echo $date->format("Y-m-d"); ?>"><br>
        Hora: <input type="time" name="time" id="time" value="<?php echo $date->format("H:m"); ?>"><br> 
        Paciente: <input type="text" name="title" id="title"><br>
        Sintomas: <input type="text" name="description" id="description"><br>
        Tempo de Atendimento:
        <select name="horasAtendimento" id="horasAtendimento">
            <option value="">Selecione</option>
            <option value="15">15 min</option>
            <option value="30">30 min</option>
            <option value="45">45 min</option>
        </select><br>
        <input type="submit" value="Marcar Consulta">
    </form>

<?php include(DIRREQ."lib/html/footer.php"); ?>