<?php

namespace Http\controllers\notes;

use Core\App;
use Core\DAO\NoteDAO;
use Core\DAOFact;

class NotesController
{
    private $errors = [];
    private NoteDAO $daoNotes;

    public function __construct()
    {
        $this->daoNotes = NoteDAO::getInstance();
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
        $notes = getAllNotes();
        view("notes/index.view.php", [
            'heading' => 'My Notes',
            'notes' => $notes
        ]);
    }
}