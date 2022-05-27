<?php include("../../config/config.php"); ?>
<?php include(DIRREQ."lib/html/header.php"); ?>
<?php
    $objEvents=new \Classes\ClassEvents();
    $events=$objEvents->getEventsById($_GET['id']);
    $date=new \DateTime($events['start']);
?>

    <form name="formEdit" id="formEdit" method="post" action="<?php echo DIRPAGE.'controllers/ControllerEdit.php'; ?>">
        <div class="container">
            <div class="form-group">
            <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $_GET['id']; ?>">
            </div>

            <div class="form-group">
            <label for="title">Paciente</label>
            <input type="text" name="title" id="title" class="form-control" value="<?php echo $events['title']; ?>">
            <small id="helpId" class="text-muted">Nome</small>
            </div>

            <div class="form-group">
            <label for="description">Sintomas</label>
            <input type="text" name="description" id="description" class="form-control" value="<?php echo $events['description']; ?>">
            <small id="helpId" class="text-muted">Descrição</small>
            </div>

            <div class="form-group">
            <label for="date">Data</label>
            <input type="date" name="date" id="date" class="form-control" value="<?php echo $date->format("Y-m-d"); ?>">
            <small id="helpId" class="text-muted">Data da consulta</small>
            </div>
            
            <div class="form-group">
            <label for="time">Hora</label>
            <input type="time" name="time" id="time" class="form-control" value="<?php echo $date->format("H:i"); ?>">
            <small id="helpId" class="text-muted">Horário da consulta</small>
            </div>
            <br>
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
    
    
<?php include(DIRREQ."lib/html/footer.php"); ?>

