<?php
class Post
{
    public $id;
    public $title;
    public $content;
    public $created_at;

    public static function selectAll()
    {
        $pdo = Connection::dbFactory(include DB_CONFIG_FILE);
        $stmt = $pdo->query("SELECT * FROM posts");
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $posts;
    }

    public static function store($parameters)
    {
        $pdo = Connection::dbFactory(include DB_CONFIG_FILE);
        $statment=$pdo->prepare("INSERT INTO posts (title, content, status) VALUES (?, ?, ?)");
        $statment->bindParam(1, $title);
        $statment->bindParam(2, $content);
        $statment->bindParam(3, $status);
        $title = $parameters['title'];
        $content = $parameters['content'];
        $status = $parameters['status'];
        $statment->execute();
    }

}