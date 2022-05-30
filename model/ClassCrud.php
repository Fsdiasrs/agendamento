<?php
namespace Models;
class ClassCrud extends ClassConect{
    private $crud;

    #Responsável pela preparação da query e execução
    private function prepareExecute($prep, $exec){
        $this->crud=$this->conectDB()->prepare($prep);
        $this->crud->execute($exec);
    }

    #seleção de dados
    public function selectDB($fields, $table, $where, $exec){
        $this->prepareExecute("select {$fields} from {$table} {$where}", $exec);
        return $this->crud;
    }

    #inserção de dados
    public function insertDB($table, $values, $exec){
        $this->prepareExecute("insert into {$table} values({$values})", $exec);
        return $this->crud;
    }

    #delete de dados
    public function deletetDB($table, $where, $exec){
        $this->prepareExecute("delete from {$table} where id={$where}",$exec);
        return $this->crud;
    }

    #update de dados
    public function updateDB($table, $values, $where, $exec){
        $this->prepareExecute("update {$table} set = {$values} where {$where}",$exec);
        return $this->crud;
    }
}
?>