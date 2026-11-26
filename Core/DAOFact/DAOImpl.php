<?php

use Core\App;
use Core\DAOFact\DAOFactory;
use Core\Database;

class DAOImpl implements DAOFactory
{
    private $db;
    public function __construct(){
        $this->db = App::resolve(Database::class);
    }

    public function getNote($id)
    {
        // TODO: Implement getNote() method.
    }

    public function getNotes()
    {
        // TODO: Implement getNotes() method.
    }

    public function createNote($nota)
    {
        // TODO: Implement createNote() method.
    }

    public function updateNote($id, $nota)
    {
        // TODO: Implement updateNote() method.
    }

    public function deleteNote($id)
    {
        // TODO: Implement deleteNote() method.
    }
}