<?php

namespace Core\DAO;

use Core\App;
use Core\Database;


class NoteDAOImpl implements NoteDAO
{
    private $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function getNote($id)
    {
        return $this->db->query('select * from notes where id = :id', [
            'id' => $id,
        ])->findOrFail();
    }

    public function getNotes()
    {
        return $this->db->query('select * from notes where user_id = :user', [
            'user' => $_SESSION['user']['userId']
        ])->get();
    }

    public function createNote($nota)
    {
        $this->db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => $userId = $_SESSION['user']['userId']
        ]);
    }

    public function updateNote($id, $body)
    {
        $this->db->query('update notes set body = :body where id = :id', [
            'id' => $id,
            'body' => $body,
        ]);
    }

    public function deleteNote($id)
    {
        $this->db->query('delete from notes where id = :id', [
            'id' => $_POST['id']
        ]);
    }
}