<?php include("../../config/config.php"); ?>
<?php include(DIRREQ."lib/html/header.php"); ?>
<?php
    $objEvents=new \Classes\ClassEvents();
    $events=$objEvents->getEventsById($_GET['id']);
    $date=new \DateTime($events['start']);
?>

    <form name="formEdit" id="formEdit" method="post" action="<?php echo DIRPAGE.'controllers/ControllerEdit.php'; ?>">
        <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>"><br>
        <label for="date" class="sr-only">Data</label>
        Data: <input type="date" name="date" id="date" value="<?php echo $date->format("Y-m-d"); ?>"><br>
        Hora: <input type="time" name="time" id="time" value="<?php echo $date->format("H:i"); ?>"><br>
        Paciente: <input type="text" name="title" id="title" value="<?php echo $events['title']; ?>"><br>
        Sintomas: <input type="text" name="description" id="description" value="<?php echo $events['description']; ?>"><br>
        <button class="btn btn-outline-primary" type="submit"><span class="icon">
            <ion-icon name="thumbs-up-outline"></ion-icon>
            </span>
            <span class           = "title">Confirmar</span>
        </button>
        
    </form>
    <a id="delete" class="btn btn-outline-danger" href="<?php echo DIRPAGE.'controllers/ControllerDelete.php?id='.$_GET['id']; ?>">
        <span class           = "icon">
                <ion-icon name="trash-outline"></ion-icon>
        </span>
        <span class           = "title">Deletar</span>
    </a>
    
<?php include(DIRREQ."lib/html/footer.php"); ?>

