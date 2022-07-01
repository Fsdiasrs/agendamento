<?php \Classes\ClassLayout::setHeadRestrito("user"); ?>
<?php \Classes\ClassLayout::setHead('Dados do Paciente', 'Visualize os dados do Paciente.', 'Fábio Dias'); ?>
<?php \Classes\ClassLayout::setMenu(); ?>
<?php
$objPaciente=new \Models\ClassLogin();

if(!empty($_GET['search'])){
    $b=$objPaciente-> getDataAllUserByName($_GET['search']);
}else {
    $b=$objPaciente->getDataAllUser();
}

?>


<div class="container center">
    <div class="box-search">
        <input type="search" class="form-control w-50 m10" placeholder="Pesquisar" id="pesquisar">
        <button class="btn btn-primary m10" onclick="searchData()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
        </button>
    </div>

    <span id="msgAlerta"></span>
    
    <table id="listar-usuario" class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Opções</th>
        </thead>
        <tbody>
            <?php
           
            $index = $b['rows'];
             for($i=0; $i<$index; $i++){
                echo "<tr>";
                        echo "<td>".$b['data'][$i]['id']."</td>";
                        echo "<td>".$b['data'][$i]['nome']."</td>";
                        echo "<td>
                        <a class='btn btn-sm btn-primary' href='".DIRPAGE."editUsuario?id=".$b['data'][$i]['id']." 'title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a id='deleteCad' class='btn btn-sm btn-danger' href='".DIRPAGE."controllers/controllerDeleteCad?id=".$b['data'][$i]['id']."'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                            </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>   
</div> 
<?php \Classes\ClassLayout::setFooter(); ?>