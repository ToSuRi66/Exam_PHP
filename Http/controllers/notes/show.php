<?php

use Core\App;
use Core\Database;
use Http\controllers\notes\NotesController;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = NotesController::getNote($db);

authorize($note['user_id']);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
