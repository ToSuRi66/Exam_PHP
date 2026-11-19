<?php

use Core\App;
use Core\Database;
use Core\NotesController;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = NotesController::selectNote($db);

authorize($note['user_id'] === $currentUserId);

NotesController::deleteNote($db);

header('location: /notes');
exit();
