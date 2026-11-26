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
        $userId = $_SESSION['dbUserId'];
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
    
}