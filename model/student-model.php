<?php

// förbättringsområden: skapa en class SchoolModel som denna klassen ärver (extends)

// Model för tabellen Students

class StudentModel
{
    private $pdo;

    public function __construct()
    {
        $host = 'localhost';
        $dbname = 'school-api';
        $password = 'abc123';
        $charset = 'utf8';
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false
        ];
        $pdo = new PDO($dsn, $dbname, $password, $options);
        $this->pdo = $pdo;
    }

    function getStudents()
    {
        $statement = $this->pdo->prepare('SELECT students.*,class.name AS class_name FROM students JOIN class ON students.class_id=class.id;');
        $statement->execute();

        return $statement->fetchAll();
    }
}
