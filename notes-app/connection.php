<?php

class Connection{
    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:server=localhost;dbname=notes', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getNotes(){
        $query = 'SELECT * FROM notes ORDER BY create_date DESC';
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addNote($note){
        $query = 'INSERT INTO notes(title, description, create_date) VALUES (:title, :description, :date);';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('title', $note['title']);
        $statement->bindValue('description', $note['description']);
        $statement->bindValue('date', date('Y-m-d H:i:s'));

        return $statement->execute();
    }

    public function getNoteById($id){
        $query = 'SELECT * FROM notes WHERE id=:id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteNote($id){
        $query = 'DELETE FROM notes WHERE id = :id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id);
        return $statement->execute();
    }

    public function updateNote($id, $note){
        $query = 'UPDATE notes SET title=:title, description=:description WHERE id=:id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id);
        $statement->bindValue('title', $note['title']);
        $statement->bindValue('description', $note['description']);
        return $statement->execute();
    }
}

return $connection = new Connection();
?>