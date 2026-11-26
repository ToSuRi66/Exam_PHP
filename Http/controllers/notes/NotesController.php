<?php

namespace Http\controllers\notes;

use Core\App;
use Core\DAO\NoteDAO;
use Core\DAO\NoteDAOFactory;

class NotesController
{
    private $errors = [];
    private NoteDAO $daoNotes;

    public function __construct()
    {
        $this->daoNotes = NoteDAOFactory::getInstance()->getImplementacio();
    }

    function destroyNote()
    {
        $userId = $_SESSION['userId'];
        $note = selectNote();

        authorize($note['user_id']);

        deleteNote();

        header('location: /notes');
        exit();
    }


    function index()
    {
        $notes = $this->daoNotes->getNotes();
        view("notes/index.view.php", [
            'heading' => 'My Notes',
            'notes' => $notes
        ]);
    }

    function show(){
        $id = $_GET['id'];
        $note = $this->daoNotes->getNote($id);
//        dd($_SESSION);
        authorize($note['user_id'] === $_SESSION['user']['userId']);

        view("notes/show.view.php", [
            'heading' => 'Note',
            'note' => $note
        ]);
    }
}