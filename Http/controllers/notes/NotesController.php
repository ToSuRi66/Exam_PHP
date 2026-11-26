<?php

namespace Http\controllers\notes;

use Core\App;
use Core\Database;

class NotesController
{

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