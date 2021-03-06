<?php
namespace Classes;

use Models\ClassConect;


class ClassEvents extends ClassConect
{
    #Trazer os dados de eventos do banco

    public function getEvents(){
        $obsEvents = new \Models\ClassCrud();
        $b = $obsEvents->selectAllDB("*","events",array());
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($f);
    }

    #Criação da consulta no banco
    public function createEvent($id=0,$id_usuario,$title,$description,$color='blue',$start,$end)
    {
        $b=$this->conectDB()->prepare("insert into events values (?,?,?,?,?,?,?)");
        $b->bindParam(1, $id, \PDO::PARAM_INT);
        $b->bindParam(2, $id_usuario, \PDO::PARAM_INT);
        $b->bindParam(3, $title, \PDO::PARAM_STR);
        $b->bindParam(4, $description, \PDO::PARAM_STR);
        $b->bindParam(5, $color, \PDO::PARAM_STR);
        $b->bindParam(6, $start, \PDO::PARAM_STR);
        $b->bindParam(7, $end, \PDO::PARAM_STR);
        $b->execute();
    }

    #Buscar eventos pelo id
    public function getEventsById($id)
    {
        $b=$this->conectDB()->prepare("select * from events where id=?");
        $b->bindParam(1, $id, \PDO::PARAM_INT);
        $b->execute();
        return $f=$b->fetch(\PDO::FETCH_ASSOC);
    }

    #Update no banco de dados
    public function updateEvent($id_usuario,$title,$description,$start,$end,$id)
    {
        $b=$this->conectDB()->prepare("update events set id_usuario=?, title=?, description=?, start=?, end=? where id=?");
        $b->bindParam(1, $id_usuario, \PDO::PARAM_INT);
        $b->bindParam(2, $title, \PDO::PARAM_STR);
        $b->bindParam(3, $description, \PDO::PARAM_STR);
        $b->bindParam(4, $start, \PDO::PARAM_STR);
        $b->bindParam(5, $end, \PDO::PARAM_STR);
        $b->bindParam(6, $id, \PDO::PARAM_INT);
        $b->execute();
    }

    #Deletar no banco de dados
    public function deleteEvent($id)
    {
        $b=$this->conectDB()->prepare("delete from events where id=?");
        $b->bindParam(1, $id, \PDO::PARAM_INT);
        $b->execute();
    }

    //Atualização de data hora pelo arraste e redimensionamento
    public function updateDropEvent($id,$start,$end)
    {
        $b=$this->conectDB()->prepare("update events set start=?, end=? where id=?");
        $b->bindParam(1, $start, \PDO::PARAM_STR);
        $b->bindParam(2, $end, \PDO::PARAM_STR);
        $b->bindParam(3, $id, \PDO::PARAM_INT);
        $b->execute();
    }

}
