<?php include("../config/config.php"); ?>
<?php \Classes\ClassLayout::setHeadRestrito("manager"); ?>
<?php \Classes\ClassLayout::setHead('Editar Horários','Edite o horário.',''); ?>
<?php \Classes\ClassLayout::setMenu(); ?>

<?php    
    $objEvents=new \Classes\ClassEvents();
    $events=$objEvents->getEventsById($_GET['id']);
    $date=new \DateTime($events['start']);
    $permition=$_SESSION['permition'];
    /* var_dump($events); */
    
?>

<?php 
  $objUsuario = new \Models\ClassCrud();
  $b = $objUsuario->selectDB("*","users","where id=?",array($events['id_usuario']));
  $f = $b->fetch(\PDO::FETCH_ASSOC);
  $r = $b->rowCount();
  $usuario = [
    "dados"=>$f,
    "rows"=>$r
  ];
  /* var_dump($usuario); */
  ?>
    <div class="topFaixa float w100 center mb-3">Confirmação de Consulta</div>
    <form name="formEdit" id="formEdit" method="post" action="<?php echo DIRPAGE.'controllers/ControllerEdit.php'; ?>">
        <div class="container-sm">
            <input type="hidden" name="id" id="id" class="form-control m10" value="<?php echo $_GET['id']; ?>">
            <input type="hidden" name="permition" id="permition" class="form-control m10" value="<?php echo $permition; ?>">
            <input type="text" name="title" id="title" class="form-control m10" value="<?php echo $usuario['dados']['nome']; ?>" required>
            <input type="text" name="description" id="description" class="form-control m10" value="<?php echo $events['description']; ?>" required>
            <input type="date" name="date" id="date" class="form-control m10" value="<?php echo $date->format("Y-m-d"); ?>" required>
            <input type="time" name="time" id="time" class="form-control m10" value="<?php echo $date->format("H:i"); ?>" required>
            <select class="form-select m10" name="horasAtendimento" id="horasAtendimento" require>
                <option value="">Selecione</option>
                <option value="15">15_min</option>
                <option value="30">30_min</option>
                <option value="45">45_min</option>
                <option value="60">60_min</option>
            </select>
            
            <input type="radio" id="sim" name="fav_language" value="1">
            <label for="html">Sim</label><br>
            <input type="radio" id="nao" name="fav_language" value="0" checked>
            <label for="css">Não</label><br>
            <input class="float w100 h40" type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" required>
            <br>
            <button id="confirmar" class="btn btn-outline-primary" type="submit"><span class="icon">
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