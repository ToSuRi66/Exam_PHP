<?php

use Core\App;
use Core\Database;
use Http\controllers\notes\NotesController;

$db = App::resolve(Database::class);
$notes = NotesController::getAllNotes();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);