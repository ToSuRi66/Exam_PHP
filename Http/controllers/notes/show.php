<?php

use Core\App;
use Core\Database;
use Core\NotesController;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = NotesController::getNote($db);

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
