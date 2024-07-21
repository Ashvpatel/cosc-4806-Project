<?php

class User {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {
    }

    public function test () {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM users;");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function authenticate($username, $password) {
        $username = strtolower($username);
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM users WHERE username = :name;");
        $statement->bindValue(':name', $username);
        $statement->execute();
        $rows = $statement->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $rows['password'])) {
            $_SESSION['auth'] = 1;
            $_SESSION['username'] = ucwords($username);
            header('Location: /home');
            die;
        } else {
            if (isset($_SESSION['failedAuth'])) {
                $_SESSION['failedAuth']++;
            } else {
                $_SESSION['failedAuth'] = 1;
            }
            header('Location: /login');
            die;
        }
    }

    public function save_rating($movie_title, $rating) {
        $db = db_connect();
        $statement = $db->prepare("REPLACE INTO ratings (username, movie_title, rating) VALUES (:username, :movie_title, :rating);");
        $statement->bindValue(':username', $_SESSION['username']);
        $statement->bindValue(':movie_title', $movie_title);
        $statement->bindValue(':rating', $rating);
        $statement->execute();
    }

    public function get_user_rating($movie_title) {
        $db = db_connect();
        $statement = $db->prepare("SELECT rating FROM ratings WHERE username = :username AND movie_title = :movie_title;");
        $statement->bindValue(':username', $_SESSION['username']);
        $statement->bindValue(':movie_title', $movie_title);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['rating'] : null;
    }
}
?>
