<?php

namespace Core\DAO;

class NoteDAOFactory
{
    private static $instance;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getImplementacio(){
        return new NoteDAOImpl();
    }
}