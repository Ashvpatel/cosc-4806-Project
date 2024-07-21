<?php
function db_connect() {
    try { 
        $dbh = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_DATABASE, DB_USER, DB_PASS);
        return $dbh;
    } catch (PDOException $e) {
        // Set the global variable to indicate the database is down
        $GLOBALS['db_status'] = 'down';
        echo 'Database connection failed: ' . $e->getMessage();
    }
}

// Example usage of the function and checking the global variable
$dbh = db_connect();
if ($GLOBALS['db_status'] == 'down') {
    // Handle the scenario when the database is down
    echo 'The database is currently unavailable. Please try again later.';
}
?>