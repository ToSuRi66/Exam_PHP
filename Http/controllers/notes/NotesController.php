<?php

namespace Http\controllers\notes;

use Core\App;
use Core\Database;
use Core\Session;

class NotesController
{


    function selectNote()
    {
        return Database::class->query('select * from notes where id = :id', [
            'id' => $_POST['id']
        ])->findOrFail();
    }


    function getNote()
    {
        return Database::class->query('select * from notes where id = :id', [
            'id' => $_GET['id']
        ])->findOrFail();
    }


    function deleteNote()
    {
        App::resolve(Database::class)->query('delete from notes where id = :id', [
            'id' => $_POST['id']
        ]);
    }


    static function getAllNotes()
    {
        return App::resolve(Database::class)->query('select * from notes where user_id = :user', [
            'user' => $_SESSION['dbUserId']
        ])->get();
    }


    function updateNote()
    {
        Database::class->query('update notes set body = :body where id = :id', [
            'id' => $_POST['id'],
            'body' => $_POST['body']
        ]);
    }


    function addNote()
    {
        Database::class->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => $userId = $_SESSION['dbUserId']
        ]);
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