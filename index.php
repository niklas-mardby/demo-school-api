<?php

// Controller som tittar på query string samt agerar på användarens valda action/qs

// localhost/mappar/  -> htdosc/mappar/index.php
// GET-parametrar som en enkel routing
// nackdel med en index.php är att den kan bli lång
// bryter vi ut till controller/

require_once 'view/student-api.php';
require_once 'model/student-model.php';

$studentModel = new StudentModel();
$studentAPI = new StudentAPI();

if (isset($_GET['action'])) {
    $chosenAction = filter_var($_GET['action'], FILTER_SANITIZE_SPECIAL_CHARS);

    if ($chosenAction == 'students') {
        $studentAPI->outputStudents($studentModel->getStudents());
    }
}
