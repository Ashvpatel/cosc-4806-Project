<?php

/* database connection stuff here
 * 
 */

function db_connect() {
    try { 
        $dbh = new PDO('mysql:host=' . DB_HOST . ';port='. DB_PORT . ';dbname=' . DB_DATABASE, DB_USER, $_ENV['DB_PASS']);
        return $dbh;
    } catch (PDOException $e) {
      echo 23;
        //We should set a global variable here so we know the DB is down
    }
}