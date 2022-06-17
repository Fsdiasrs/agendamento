<?php include("../config/config.php"); ?>
<?php \Classes\ClassLayout::setHeadRestrito("manager"); ?>
<?php \Classes\ClassLayout::setHead('Editar Horários','Edite o horário.',''); ?>

<?php
    $objEvents=new \Classes\ClassEvents();
    $events=$objEvents->getEventsById($_GET['id']);
    $date=new \DateTime($events['start']);
?>
<div class="topFaixa float w100 center">
    Confirmação de Consulta
</div>
<input class="float w100 h40" type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" required>
    <form name="formEdit" id="formEdit" method="post" action="<?php echo DIRPAGE.'controllers/ControllerEdit.php'; ?>">
        <div class="container-sm">
            <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $_GET['id']; ?>">
            <input type="text" name="title" id="title" class="form-control" value="<?php echo $events['title']; ?>">
            <input type="text" name="description" id="description" class="form-control" value="<?php echo $events['description']; ?>">
            <input type="date" name="date" id="date" class="form-control" value="<?php echo $date->format("Y-m-d"); ?>">
            <input type="time" name="time" id="time" class="form-control" value="<?php echo $date->format("H:i"); ?>">
            <button class="btn btn-outline-primary" type="submit"><span class="icon">
                <ion-icon name="thumbs-up-outline"></ion-icon>
                </span>
                <span class           = "title">Confirmar</span>
            </button>
            <a id="delete" class="btn btn-outline-danger" href="<?php echo DIRPAGE.'controllers/ControllerDelete.php?id='.$_GET['id']; ?>">
                <span class           = "icon">
                        <ion-icon name="trash-outline"></ion-icon>
                </span>
                <span class           = "title">Deletar</span>
            </a>
        </div>
    </form>



<?php \Classes\ClassLayout::setFooter(); ?>