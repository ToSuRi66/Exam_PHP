<?php

namespace Core\DAO;

interface NoteDAO
{
    public function getNote($id);

    public function getNotes();

    public function createNote($nota);

    public function updateNote($id, $nota);

    public function deleteNote($id);

}