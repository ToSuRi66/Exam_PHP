<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Http\controllers\notes\NotesController;

$db = App::resolve(Database::class);

$currentUserId = 222221;

// find the corresponding note
$note = NotesController::selectNote($db);

// authorize that the current user can edit the note
authorize($note['user_id']);

// validate the form
$errors = [];

if (! Validator::string($_POST['body'], 1, 10)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

// if no validation errors, update the record in the notes database table.
if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

NotesController::updateNote();

// redirect the user
header('location: /notes');
die();
