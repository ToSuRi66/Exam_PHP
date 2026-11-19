<?php

use Core\App;
use Core\Database;
use Core\NotesController;

$db = App::resolve(Database::class);
$notes = NotesController::getAllNotes($db);

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);