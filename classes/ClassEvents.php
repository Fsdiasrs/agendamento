<?php
namespace Classes;

use Models\ClassCrud;

class ClassEvents extends ClassCrud
{
    #Trazer os dados de eventos do banco
    public function getEvents()
    {
        $b=$this->selectDB(
            "*",
            "events",
            "",
            array()
        );
        $f=$b->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($f);
    }
}
