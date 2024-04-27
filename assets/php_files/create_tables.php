<?php
// PostgreSQL database connection
$host = "127.0.0.1";
$port = "5432";
$dbname = "edusogno-esercizio";
$user = "postgres";
$password = "1234";

// Establish PostgreSQL database connection
$dbconn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}

// SQL statements to create tables if they don't exist
$sql1 = "CREATE TABLE IF NOT EXISTS utenti (
    id serial PRIMARY KEY,
    nome varchar(45),
    cognome varchar(45),
    email varchar(255),
    password varchar(255)
)";

$sql2 = "CREATE TABLE IF NOT EXISTS eventi (
    id serial PRIMARY KEY,
    attendees text,
    nome_evento varchar(255),
    data_evento timestamp
)";

// Execute SQL queries
$result1 = pg_query($dbconn, $sql1);
$result2 = pg_query($dbconn, $sql2);

if ($result1 && $result2) {
    echo "Tables created successfully";
} else {
    echo "Error creating tables: " . pg_last_error($dbconn);
}

// Close the database connection
pg_close($dbconn);
?>
