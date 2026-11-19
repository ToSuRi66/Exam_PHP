<?php

namespace Core;

class NotesController
{
    public static function selectNote($db)
    {
        return $db->query('select * from notes where id = :id', [
            'id' => $_POST['id']
        ])->findOrFail();
    }

    public static function getNote($db)
    {
        return $db->query('select * from notes where id = :id', [
            'id' => $_GET['id']
        ])->findOrFail();
    }

    public static function deleteNote($db)
    {
        $db->query('delete from notes where id = :id', [
            'id' => $_POST['id']
        ]);
    }

    public static function getAllNotes($db){
        return $db->query('select * from notes where user_id = 1')->get();
    }

    public static function updateNote($db)
    {
        $db->query('update notes set body = :body where id = :id', [
            'id' => $_POST['id'],
            'body' => $_POST['body']
        ]);
    }

    public static function addNote($db){
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}