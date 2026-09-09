<?php

class Post {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    function createPost($name, $post, $author) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO POSTS (post_name, post, author) VALUES (:name, :post, :author)");
            $stmt->bindValue("name", htmlspecialchars($name));
            $stmt->bindValue("post", htmlspecialchars($post));
            $stmt->bindValue("author", $author);

            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    function getAllPosts() {
        $stmt = $this->conn->prepare("SELECT * FROM POSTS");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}