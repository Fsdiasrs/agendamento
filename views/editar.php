<?php include("../config/config.php"); ?>
<?php \Classes\ClassLayout::setHeadRestrito("manager"); ?>
<?php \Classes\ClassLayout::setHead('Editar Horários', 'Edite o horário.', ''); ?>
<?php \Classes\ClassLayout::setMenu(); ?>

<?php
$objEvents = new \Classes\ClassEvents();
$id=filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
$events = $objEvents->getEventsById($_GET['id']);
$date = new \DateTime($events['start']);
$permition = $_SESSION['permition'];
/* var_dump($events); */
$objPaciente=new \Models\ClassLogin();
$b=$objPaciente->getDataUserById($events['id_usuario']);
/* var_dump($b); */
?>
<div class="topFaixa float w100 center mb-3">Confirmação de Consulta</div>
<form name="formEdit" id="formEdit" method="post" action="<?php echo DIRPAGE . 'controllers/ControllerEdit.php'; ?>">
    <div class="container-sm">
        <input type="hidden" name="id" id="id" class="form-control m10" value="<?php echo $id; ?>">
        <input type="hidden" name="permition" id="permition" class="form-control m10" value="<?php echo $permition; ?>">
        <input type="hidden" name="id_usuario" id="id_usuario" class="form-control m10"  value="<?php echo $events['id_usuario']; ?> ">
        <input type="text" name="emailEmp" id="emailEmp" class="form-control m10"  value="<?php echo $b['data']['emailEmp']; ?> ">
        <input type="text" name="title" id="title" class="form-control m10" value="<?php echo $b['data']['nome'];?>"  required>
        <input type="text" name="description" id="description" class="form-control m10" value="<?php echo $events['description']; ?>" required>
        <input type="date" name="date" id="date" class="form-control m10" value="<?php echo $date->format("Y-m-d"); ?>" required>
        <input type="time" name="time" id="time" class="form-control m10" value="<?php echo $date->format("H:i"); ?>" required>
        <select class="form-select m10" name="horasAtendimento" id="horasAtendimento" require>
            <option value="">Selecione tempo de consulta</option>
            <option value="15">15_min</option>
            <option value="30">30_min</option>
            <option value="45">45_min</option>
            <option value="60">60_min</option>
        </select>
        <div class="m10">
            <p>Compareceu a consulta</p>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                <label class="form-check-label" for="inlineRadio1">Sim</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0" checked>
                <label class="form-check-label" for="inlineRadio2">Não</label>
            </div>
        </div>
            <button id="confirmar" class="btn btn-outline-primary" type="submit"><span class="icon">
                <ion-icon name="thumbs-up-outline"></ion-icon>
            </span>
            <span class="title">Confirmar</span>
        </button>
        <a id="delete" class="btn btn-outline-danger" href="<?php echo DIRPAGE . 'controllers/ControllerDelete.php?id=' . $id; ?>">
            <span class="icon">
                <ion-icon name="trash-outline"></ion-icon>
            </span>
            <span class="title">Deletar</span>
        </a>
    </div>
</form>


<script>
        document.getElementById('confirmar').addEventListener('click', async function(){
            Swal.fire(
              'Sucesso!',
              'Consulta Confirmada',
              'success'
            )
        });
</script>
<?php \Classes\ClassLayout::setFooter(); ?>