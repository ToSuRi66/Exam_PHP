<?php

namespace Core\DAOFact;

interface DAOFactory
{
    public function getNote($id);

    public function getNotes();

    public function createNote($nota);

    public function updateNote($id, $nota);

    public function deleteNote($id);

}