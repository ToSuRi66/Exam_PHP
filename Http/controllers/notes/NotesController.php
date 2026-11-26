<?php

namespace Http\controllers\notes;

use Core\App;
use Core\DAO\NoteDAO;
use Core\DAO\NoteDAOFactory;
use Core\Validator;

class NotesController
{
    private $errors = [];
    private NoteDAO $daoNotes;

    public function __construct()
    {
        $this->daoNotes = NoteDAOFactory::getInstance()->getImplementacio();
    }

    function destroy()
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
        authorize($note['user_id'] === $_SESSION['user']['userId']);

        view("notes/show.view.php", [
            'heading' => 'Note',
            'note' => $note
        ]);
    }

    function create(){
        view("notes/create.view.php", [
            'heading' => 'Create Note',
            'errors' => []
        ]);
    }

    function store()
    {
        if (! Validator::string($_POST['body'], 1, 1000)) {
            $this->errors['body'] = 'A body of no more than 1,000 characters is required.';
        }

        if (! empty($errors)) {
            return view("notes/create.view.php", [
                'heading' => 'Create Note',
                'errors' => $this->errors
            ]);
        } else {
            $this->daoNotes->createNote([
                'body' => $_POST['body'],
            ]);
            header('location: /notes');
            die();
        }
    }
}